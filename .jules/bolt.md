## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-03-25 - [Redundant Object Instantiation in Loops]
**Learning:** Benchmarking reveals that redundant object instantiations like `new Date()` within loops (e.g., the `PROPS.experience` loop) can severely impact performance. Removing these unnecessary allocations reduces the execution time for the loop block by approximately 70-86%.
**Action:** Always extract static instantiations like `new Date()` outside of loops, and completely remove dead code that performs date-based calculations but is never used, to prevent redundant object creation.
