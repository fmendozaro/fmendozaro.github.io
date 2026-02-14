## 2026-01-27 - Tabnabbing Vulnerabilities in External Links
**Vulnerability:** Multiple external links (index.html and dynamically generated in main.js) used `target="_blank"` without `rel="noopener noreferrer"`.
**Learning:** The codebase relies on manual HTML creation and template literals without a linting rule to enforce secure link attributes.
**Prevention:** Enforce `rel="noopener noreferrer"` for all `target="_blank"` links. Consider using a linter or a helper function to generate links.
