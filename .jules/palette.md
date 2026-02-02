## 2024-05-22 - [Dynamic Content Accessibility]
**Learning:** Dynamic content injection (like iterating over a JSON object to create HTML strings) often bypasses standard accessibility checks because the HTML isn't visible in the source code.
**Action:** Always verify generated HTML strings for `alt` text, `aria-labels`, and security attributes like `rel="noopener noreferrer"`.
