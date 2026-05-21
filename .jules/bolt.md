## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-15 - [Synchronous Operations in Global Event Listeners]
**Learning:** The application had a `console.log` inside a global `keyup` event listener. Synchronous I/O operations inside frequently triggered global event listeners block the main thread and can lead to performance degradation, particularly on less powerful devices, as they interrupt the browser's render cycle for every keystroke.
**Action:** Avoid synchronous operations, especially logging, inside high-frequency global event listeners (like `keyup`, `keydown`, `scroll`, or `mousemove`). If logging is needed for development, ensure it is removed or conditionally disabled in production code.
