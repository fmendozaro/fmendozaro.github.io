## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-18 - Avoid repeated Date instantiations in loops
**Learning:** Found redundant `new Date()` calls inside small loops (e.g., the 6-item `PROPS.experience` loop) that when removed reduce the execution time for that block by ~70%. Unused variables were also calculated inside the loop.
**Action:** Always check for and hoist invariant expensive object instantiations like `new Date()` out of loops or remove them completely if the calculated value is unused to avoid unnecessary memory allocation and processing time.
