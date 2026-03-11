## 2024-05-22 - [Manual Security Attributes in Template Literals]
**Vulnerability:** Missing `rel="noopener noreferrer"` in dynamically generated HTML links using `target="_blank"`.
**Learning:** The codebase generates UI components (like Project cards) using JavaScript template literals in `js/main.js`. This bypasses any automatic security features that a modern framework might offer, requiring manual addition of security attributes.
**Prevention:** When adding new dynamic content via `js/main.js`, explicitly verify all `target="_blank"` links include `rel="noopener noreferrer"`.
