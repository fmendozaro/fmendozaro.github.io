## 2026-01-28 - Reverse Tabnabbing via target="_blank"

**Vulnerability:**
Multiple external links (both static in `index.html` and dynamically generated in `js/main.js`) used `target="_blank"` without the accompanying `rel="noopener noreferrer"` attribute. This exposes the application to Reverse Tabnabbing attacks, where a malicious target page can manipulate the original page via the `window.opener` object (e.g., redirecting it to a phishing site).

**Learning:**
This vulnerability is common because `target="_blank"` is the standard way to open new tabs, but the security implication of the shared `window.opener` context is often overlooked. It persists in legacy codebases or when developers focus solely on UX (opening in new tab) without considering the security boundary.

**Prevention:**
Strictly enforce a rule: any `<a>` tag with `target="_blank"` **MUST** also have `rel="noopener noreferrer"`. This can be enforced via linter rules (e.g., `eslint-plugin-react`'s `jsx-no-target-blank` or similar HTML linters) or automated verification scripts that parse HTML and check attributes.
