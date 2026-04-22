## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-04-22 - [Avoid Redundant Instantiations in Loops]
**Learning:** Instantiating objects like `new Date()` inside loops when the value is invariant or unused (like the `years` calculation in the experience hub loop) creates unnecessary overhead. Benchmarks showed removing it reduced loop execution time by ~70%.
**Action:** Identify and remove redundant instantiations within loops. If the value is needed, instantiate it once outside the loop and reuse it.
