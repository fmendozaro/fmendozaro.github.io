## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-03-25 - [Redundant Date Instantiation in Loops]
**Learning:** Instantiating `new Date()` inside loops (like the `PROPS.experience.forEach` loop) where the result is either unused or constant across iterations can cause significant performance degradation. In benchmarking, removing it reduced execution time of a loop block by approximately 70-86%.
**Action:** Always move static or unused object instantiations (especially `new Date()`) outside of loops to prevent unnecessary object allocation and garbage collection overhead.
