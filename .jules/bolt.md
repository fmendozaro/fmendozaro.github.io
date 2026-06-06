## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-18 - [Fisher-Yates vs map().sort().map() array shuffling]
**Learning:** The previous implementation used a `.map().sort().map()` chain to shuffle an array. This method creates multiple intermediate arrays, allocating extra memory, and relies on `.sort()`, which operates at O(n log n) time complexity. For purely shuffling arrays, this overhead is noticeable, particularly in client-side code where memory allocations can trigger garbage collection.
**Action:** Use the Fisher-Yates algorithm for in-place array shuffling instead. It requires only O(n) time and minimal space (just the array copy), avoiding unnecessary object and array allocations.
