## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-19 - [Redundant DOM queries inside Event Handlers]
**Learning:** Querying the DOM (e.g., `$("#content")`) inside frequently triggered event handlers like click listeners causes unnecessary performance overhead, especially in a Single Page Application pattern. If the element is structural and not created dynamically upon click, it's inefficient to search the DOM for it repeatedly.
**Action:** Always cache structural or static DOM elements (like main content wrappers) into variables at the `$(document).ready` level, and reuse these cached variables inside event handlers to avoid O(N) DOM traversals.
