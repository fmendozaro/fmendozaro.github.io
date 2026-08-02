## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-20 - [Avoid map().sort().map() for array shuffling]
**Learning:** Using chained `.map().sort().map()` calls with `Math.random()` to shuffle arrays introduces O(n log n) overhead, creates unnecessary intermediate array allocations, and has inherent statistical bias.
**Action:** Use the O(n) in-place Fisher-Yates algorithm for shuffling arrays. Always clone the source array first (e.g., `[...array]`) to prevent unintended mutation.

## 2026-08-02 - [Preconnect Resource Hints for CDNs]
**Learning:** The application heavily relies on external CDNs for core assets like Materialize CSS/JS, Google Fonts, and Google Analytics. Without early resource hints, the browser must sequentially resolve DNS, establish TCP connections, and negotiate TLS for these external domains only when the tags are encountered during HTML parsing. This adds significant latency to the critical rendering path.
**Action:** Add `<link rel="preconnect">` tags with appropriate attributes (like `crossorigin` for fonts) in the `<head>` of `index.html` to accelerate these network handshakes before the resources are actively requested, improving initial page load time.
