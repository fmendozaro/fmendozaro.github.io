## 2026-01-25 - [Unprotected External Links]
**Vulnerability:** Widespread usage of `target="_blank"` without `rel="noopener noreferrer"` in both static HTML and dynamic JS templates.
**Learning:** Legacy codebases often miss this specific attribute when using `target="_blank"`, especially in template literals.
**Prevention:** Enforce `rel="noopener noreferrer"` on all `target="_blank"` links via linting or code review, especially in dynamic string templates.
