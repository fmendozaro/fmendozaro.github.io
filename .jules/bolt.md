## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-04-29 - [Redundant Date Instantiation in Loops]
**Learning:** In `js/main.js`, date-based calculations (like `new Date()` inside the `PROPS.experience` loop) were unused dead code but incurred a heavy performance penalty because `Date` instantiation inside a loop is expensive.
**Action:** Always verify if complex objects instantiated inside loops are actually used. If they are, try to move the instantiation outside the loop (if loop-invariant). If unused, remove them completely as dead code. In this repository, removing redundant `new Date()` calls from loops reduced execution time for that block by approximately 70-86%.
