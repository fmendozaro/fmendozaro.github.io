## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-02 - [Redundant Object Instantiation in Loops]
**Learning:** Creating a `new Date()` object inside a tight loop unnecessarily impacts performance. The variables associated with it were unused (dead code).
**Action:** When finding loops, specifically those generating DOM content or shuffling arrays, avoid expensive object allocations or DOM queries inside the loop. Either move them outside the loop (if needed) or remove them entirely (if unused).
