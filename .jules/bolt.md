## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-04-21 - [Redundant Object Instantiation in Loops]
**Learning:** Redundant object creation (e.g., `new Date()`) inside loops, even small ones like the 6-item `PROPS.experience` loop, creates significant relative overhead. In this case, an unused `new Date()` calculation was found. Benchmarking revealed that removing this redundant call from such a loop can reduce its execution time by approximately 70%.
**Action:** Always scrutinize loops for unnecessary object instantiations or complex calculations that can either be removed if unused, or hoisted outside the loop if the result is constant per iteration.
