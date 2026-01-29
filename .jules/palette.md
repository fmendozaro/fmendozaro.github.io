## 2026-01-29 - [Dynamic Content Accessibility]
**Learning:** Content injected via JavaScript template literals often bypasses standard accessibility checks. In this project, project cards generated via `main.js` were missing `alt` text and `aria-label`s, which would have been caught if they were static HTML.
**Action:** Always inspect JS files for string templates that generate HTML and ensure attributes like `alt`, `aria-label`, and `rel` are included dynamically.
