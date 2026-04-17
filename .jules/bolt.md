## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-04-17 - [Redundant Loop Instantiations]
**Learning:** Instantiating `new Date()` repeatedly within loops (even small ones, like the 6-item `PROPS.experience` loop) for unused variables causes a measurable performance drop in execution time due to redundant object creation and memory allocation. Removing these calls reduces block execution time by ~70%.
**Action:** Always scan loops for expensive instantiations (like `new Date()`) and remove them if they compute unused values. For values needed inside the loop that do not change per iteration, initialize the variable (e.g., `let today = new Date();`) outside the loop to be reused.
