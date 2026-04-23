## 2024-05-24 - Unnecessary object creation in UI loops
**Learning:** Instantiating `new Date()` within array mapping or looping over data items (e.g. `PROPS.experience`) inside `$(document).ready` when the value is unused causes severe execution time bloat in this jQuery-based SPA (approx 70-86% longer for the block). Also, repeated DOM querying inside event listeners hurts interaction performance.
**Action:** Remove dead date-based code inside `shuffled.forEach`, remove synchronous `console.log` from `keyup`, and cache static DOM nodes.
## 2024-05-24 - Unnecessary object creation in UI loops
**Learning:** Instantiating `new Date()` within array mapping or looping over data items (e.g. `PROPS.experience`) inside `$(document).ready` when the value is unused causes severe execution time bloat in this jQuery-based SPA (approx 70-86% longer for the block). Also, repeated DOM querying inside event listeners hurts interaction performance.
**Action:** Remove dead date-based code inside `shuffled.forEach`, remove synchronous `console.log` from `keyup`, and cache static DOM nodes.
