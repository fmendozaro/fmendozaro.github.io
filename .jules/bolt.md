## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-10-25 - [Redundant object instantiation inside loops]
**Learning:** Instantiating `new Date()` inside loops (like the `PROPS.experience` loop) creates unnecessary overhead and memory allocations, especially when the date/time being accessed does not change between iterations and is not even used.
**Action:** Lift static object instantiations and calculations outside of loops, or remove them entirely if the result is not used.
