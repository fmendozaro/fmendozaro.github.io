## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-07-08 - [O(n log n) Overhead in Array Shuffling]
**Learning:** The previous implementation used a Schwartzian transform pattern (`.map().sort().map()`) to shuffle the `PROPS.experience` array. While functional, `Array.prototype.sort()` has an O(n log n) time complexity, and chaining `.map()` creates multiple intermediate arrays, causing unnecessary memory allocation and garbage collection overhead. This is a common but inefficient anti-pattern in JavaScript for shuffling.
**Action:** Use the Fisher-Yates shuffle algorithm for in-place array shuffling. It operates in O(n) time and O(1) space (excluding the array clone), avoiding the sorting overhead and intermediate array allocations.
