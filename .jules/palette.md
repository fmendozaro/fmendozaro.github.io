## 2024-10-26 - [Icon-only buttons accessibility]
**Learning:** Icon-only buttons (like `btn-floating` in Materialize) often lack `aria-label` attributes in this codebase, making them inaccessible to screen readers.
**Action:** Always check for `aria-label` on icon-only buttons and add them if missing.
