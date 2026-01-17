## 2024-10-12 - Reverse Tabnabbing in Dynamic Content
**Vulnerability:** Found multiple instances of `target="_blank"` without `rel="noopener noreferrer"` in both static HTML (`index.html`) and, critically, in JavaScript template literals (`js/main.js`).
**Learning:** Developers often forget to secure dynamically generated links. While static analysis tools catch issues in HTML files, they often miss HTML strings embedded in JavaScript.
**Prevention:** Always verify `target="_blank"` in JS template strings. Use linting rules that check for `target="_blank"` in JS strings if possible, or enforce a helper function to generate external links.
