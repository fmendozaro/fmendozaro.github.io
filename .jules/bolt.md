## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-03-25 - [Redundant DOM/Object Creation in Loops]
**Learning:** Instantiating `new Date()` within a tight loop (like `.forEach` iterating over arrays) to calculate an unused value introduces unnecessary overhead. In `js/main.js`, this was observed in the `PROPS.experience` loop.
**Action:** Always scan loops for redundant object instantiations or calculations, especially those involving `new Date()` or DOM queries, and remove them if unused or hoist them outside the loop if the value is static for all iterations.
