## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-18 - [Dead Code in Loops masquerading as Optimization Targets]
**Learning:** In `js/main.js`, there was a loop iterating through `PROPS.experience`. Inside, `let years = (new Date()).getFullYear() - e.year;` was being calculated but never used in the resulting HTML generation. My initial instinct was to extract `new Date()` outside the loop, but the real bottleneck wasn't the date instantiation—it was executing useless logic on every iteration.
**Action:** Always verify if a computed value is actually consumed before trying to micro-optimize the computation itself. Dead code elimination is the safest and most effective optimization.
