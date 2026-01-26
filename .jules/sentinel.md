## 2024-05-22 - Tabnabbing Vulnerability
**Vulnerability:** Multiple external links using `target="_blank"` without `rel="noopener noreferrer"`.
**Learning:** Legacy codebase patterns often overlook this browser security feature, and manual HTML/JS generation (template strings) bypasses automatic framework protections.
**Prevention:** Enforce linting rules (e.g., `react/jsx-no-target-blank` or similar for vanilla HTML) and educate on the risks of `window.opener` access.
