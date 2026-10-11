## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-20 - [Avoid map().sort().map() for array shuffling]
**Learning:** Using chained `.map().sort().map()` calls with `Math.random()` to shuffle arrays introduces O(n log n) overhead, creates unnecessary intermediate array allocations, and has inherent statistical bias.
**Action:** Use the O(n) in-place Fisher-Yates algorithm for shuffling arrays. Always clone the source array first (e.g., `[...array]`) to prevent unintended mutation.

## 2024-05-24 - [Preconnect for External Assets]
**Learning:** The application heavily relies on external CDN assets (Materialize CSS/JS, Google Fonts, Google Analytics). Without preconnecting, the browser waits until these resources are discovered during HTML parsing to initiate DNS resolution and TCP/TLS handshakes, delaying the critical rendering path.
**Action:** Always include `<link rel="preconnect">` tags for critical external origins (with `crossorigin` for font domains like fonts.gstatic.com) early in the `<head>` to front-load connection setup.
