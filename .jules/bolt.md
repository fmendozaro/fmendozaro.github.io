## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-03-25 - [Redundant Object Instantiation in Loops]
**Learning:** Redundant object instantiations like `new Date()` inside loops can cause significant execution time bottlenecks. In this codebase, the `new Date()` call to calculate years of experience within the `PROPS.experience` loop was not only unused dead code but benchmarking revealed it caused a ~70% execution time penalty for that block despite being a small 6-item loop.
**Action:** Always scan loops for expensive, redundant object creations or method calls that could be hoisted out of the loop or, if unused, completely removed to improve performance.
