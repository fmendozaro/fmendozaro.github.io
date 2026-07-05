## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.
## 2024-03-26 - [O(n log n) Array Shuffling Overhead]
**Learning:** The previous implementation in `js/main.js` used a `map().sort().map()` chain relying on `Math.random()` to shuffle the `PROPS.experience` array. This pattern creates unnecessary intermediate objects, imposes an O(n log n) sorting cost on what should be an O(n) operation, and suffers from the statistical bias inherent to random sorts in V8. While V8 is fast enough to make this unnoticeable for small arrays, it is an algorithmic anti-pattern.
**Action:** Use the Fisher-Yates algorithm for in-place array shuffling instead. Ensure the source array is cloned first (e.g., using the spread operator `[...array]`) to prevent unintended mutation.
