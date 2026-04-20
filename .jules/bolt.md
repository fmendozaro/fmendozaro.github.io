## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-14 - [Redundant Date Object Instantiation in Loops]
**Learning:** Instantiating `new Date()` within loops, even small ones like the `PROPS.experience` loop, adds unnecessary performance overhead. Benchmarking reveals that avoiding `new Date()` calls from loops can significantly reduce execution time for the block. Unused variables calculating derived date information in loops are dead code and should be stripped out.
**Action:** Always verify if `new Date()` can be instantiated once globally (e.g., in a `today` variable) outside the loop scope or if the date-based calculation is simply dead code.
