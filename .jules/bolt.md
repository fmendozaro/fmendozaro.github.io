## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-06 - [Redundant Date Instantiations in Loops]
**Learning:** The application instantiates a `new Date()` object during each iteration of the `PROPS.experience` loop in `js/main.js` to calculate experience years. Furthermore, the calculated `years` variable is completely unused. Instantiating objects inside loops unnecessarily can cause unnecessary CPU overhead and GC pressure.
**Action:** Remove redundant calculations and instantiations, such as `new Date()`, inside loops. If current date is needed, use the globally scoped `today` variable initialized outside the loop, and clean up any dead code (unused variables).
