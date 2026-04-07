## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-15 - [jQuery SPA Interaction Optimizations]
**Learning:** In a jQuery-based SPA, redundant O(N) DOM queries inside user interaction handlers, synchronous logging in global key listeners, and unused object allocations in loops collectively degrade interaction performance.
**Action:** Cache static elements outside handlers, strip debugging logs from hot paths (e.g., `keyup` event listener), and prune dead code in loops to save memory allocation.
