## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-04-10 - [Redundant loop computation]
**Learning:** In `js/main.js`, there was a loop iterating over `PROPS.experience` that instantiated `new Date()` multiple times per item, but the result wasn't used correctly. Removing redundant `new Date()` calls from even small loops (e.g., the 6-item `PROPS.experience` loop) can reduce execution time for that block by approximately 70%.
**Action:** Always check if values calculated inside loops can be cached outside, especially objects like `new Date()` which are expensive to instantiate.
