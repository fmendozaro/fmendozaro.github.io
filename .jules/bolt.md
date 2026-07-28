## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-20 - [Avoid map().sort().map() for array shuffling]
**Learning:** Using chained `.map().sort().map()` calls with `Math.random()` to shuffle arrays introduces O(n log n) overhead, creates unnecessary intermediate array allocations, and has inherent statistical bias.
**Action:** Use the O(n) in-place Fisher-Yates algorithm for shuffling arrays. Always clone the source array first (e.g., `[...array]`) to prevent unintended mutation.

## 2024-05-21 - [Preconnecting Critical External Resources]
**Learning:** The application heavily relies on external CDNs for critical assets like fonts, Materialize CSS, and analytics. Without preconnecting, the browser must sequentially resolve DNS, establish TCP, and negotiate TLS before it can begin downloading these assets, which delays initial rendering and increases Time to Interactive (TTI).
**Action:** Always include `<link rel="preconnect">` tags in `index.html` for critical external domains (e.g., `fonts.googleapis.com`, `cdnjs.cloudflare.com`, `googletagmanager.com`) to accelerate initial connection setup. Ensure the `crossorigin` attribute is included for font origins like `fonts.gstatic.com`.
