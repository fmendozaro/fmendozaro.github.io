## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-15 - [Caching Static DOM Elements]
**Learning:** In a jQuery-based Single Page Application (SPA), querying the DOM for static containers (like `#content`) inside user interaction event handlers (like `.click()`) leads to redundant O(N) operations. These lookups are unnecessary since the element exists on page load and does not change dynamically.
**Action:** Always cache static container elements outside of event handlers (e.g., in the `$(document).ready` scope) to avoid redundant DOM queries and minimize reflows/repaints upon user interaction.
