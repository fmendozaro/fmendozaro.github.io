## 2026-01-23 - Missing Tabnabbing Protection
**Vulnerability:** Multiple external links using `target="_blank"` without `rel="noopener noreferrer"`, exposing the site to reverse tabnabbing attacks.
**Learning:** This vulnerability appeared in both static HTML (`index.html`) and JavaScript-generated content (`js/main.js`). It highlights that client-side rendering logic needs the same security scrutiny as static templates.
**Prevention:** Enforce a rule (linting or manual review) that every `target="_blank"` must be accompanied by `rel="noopener noreferrer"`. Use automated verification scripts to scan the rendered DOM for non-compliant links.
