## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2026-05-14 - [Redundant Object Instantiation in Loops]
**Learning:** `new Date()` is relatively expensive to call repeatedly. If the data isn't actively being used or displayed, and it's calculated in a loop that runs multiple times (like the experience hubs loop), it wastes execution time. The `years` variable calculation was unused dead code in this loop.
**Action:** Always review operations inside loops, specifically object instantiations like `new Date()`. Remove unused calculations, and if they are used, evaluate if they can be cached outside the loop or if they genuinely need recalculation each iteration.

## 2024-05-20 - [Avoid map().sort().map() for array shuffling]
**Learning:** Using chained `.map().sort().map()` calls with `Math.random()` to shuffle arrays introduces O(n log n) overhead, creates unnecessary intermediate array allocations, and has inherent statistical bias.
**Action:** Use the O(n) in-place Fisher-Yates algorithm for shuffling arrays. Always clone the source array first (e.g., `[...array]`) to prevent unintended mutation.

## 2024-05-21 - [Preconnect to critical external domains]
**Learning:** Modern browsers can accelerate the loading of resources from external domains by performing DNS resolution, TCP handshakes, and TLS negotiation in advance. When a web page relies on critical third-party resources (like Google Fonts, Cloudflare CDNs, or Google Tag Manager) that are discovered later during HTML parsing, the initial load is delayed by the time required to establish these connections.
**Action:** Use `<link rel="preconnect">` in the `<head>` of the HTML document for known, critical external domains. Always include the `crossorigin` attribute for resources like `fonts.gstatic.com` that require it to properly establish the connection.
