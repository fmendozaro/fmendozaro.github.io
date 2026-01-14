## 2024-10-26 - Dynamic Content Accessibility
**Learning:** Content generated via JavaScript template strings often lacks accessibility attributes (ARIA labels, alt text) because it's separated from the main HTML structure and easily overlooked during static analysis.
**Action:** Always review JS template literals for HTML generation and ensure they include necessary ARIA attributes and security attributes like `rel="noopener noreferrer"` for external links.
