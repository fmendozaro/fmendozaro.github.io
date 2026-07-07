## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-14 - [Inefficient Array Shuffling Pattern]
**Learning:** The previous implementation used a Schwartzian transform-style shuffle chaining `.map()`, `.sort(Math.random())`, and `.map()`. In JavaScript, sorting with `Math.random()` generates a mathematically biased, non-uniform distribution (not all permutations are equally likely). Additionally, chaining these methods allocates multiple intermediate arrays and operates in O(n log n) time.
**Action:** Use an in-place Fisher-Yates algorithm for array shuffling. It operates in O(n) time, avoids intermediate object allocations, and produces a mathematically sound, unbiased shuffle. Ensure the source array is shallow copied first (e.g., using `[...array]`) if immutability is desired.
