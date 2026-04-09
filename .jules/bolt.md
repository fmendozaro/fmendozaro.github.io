## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-18 - [DOM Caching and Dead Code elimination]
**Learning:** Instantiating `new Date()` within loops for formatting or processing is a common but unnecessary performance drag if the result is invariant or unused. Also, jQuery SPA setups that don't proactively cache DOM nodes (like `$('#content')`) suffer from repetitive O(N) DOM queries on every view transition.
**Action:** Extract invariant DOM queries to module scope (outside event handlers). Actively scan arrays/loops for unused computations or redundant instantiations like `new Date()` that can be hoisted or removed entirely.
