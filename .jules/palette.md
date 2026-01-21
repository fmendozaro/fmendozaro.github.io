## 2025-02-18 - [Materialize CSS Icon-Only Buttons]
**Learning:** Materialize CSS components like `.btn-floating` and `.sidenav-trigger` are often implemented as icon-only links without accessible names, making them invisible to screen readers.
**Action:** Always manually add `aria-label` to these elements when they contain only an icon.
