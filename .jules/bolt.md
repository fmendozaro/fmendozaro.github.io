## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-18 - [Redundant loop instantiation in array formatting]
**Learning:** Instantiating `new Date()` sequentially inside array formatting loops for data that isn't functionally dependent on current system time (e.g. `(new Date()).getFullYear() - e.year;` in `PROPS.experience` that never gets injected) leads to useless JS overhead. Because it does not output anything, this was purely a hidden bottleneck.
**Action:** Always scan loops for variable declarations evaluating expensive computations (like `new Date()`) that aren't actually used in subsequent interpolations/concatenations, and safely remove them.
