## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2026-06-07 - [O(n log n) Array Shuffling Anti-Pattern]
**Learning:** Using a `.map().sort().map()` chain with `Math.random()` to shuffle an array is an inefficient anti-pattern. It introduces unnecessary intermediate array allocations and relies on the JavaScript engine's sort implementation, changing an O(n) operation into an O(n log n) operation with high overhead.
**Action:** Always use the Fisher-Yates (Knuth) algorithm for in-place array shuffling. It operates in O(n) time, avoids extra array allocations (beyond the initial copy), and produces an unbiased random distribution.
