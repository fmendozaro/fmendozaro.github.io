## 2026-01-25 - Legacy UI A11y Patterns
**Learning:** Materialize CSS projects often rely on icon-only buttons (`.btn-floating`, `.sidenav-trigger`) which lack accessible names by default.
**Action:** When working with Materialize/jQuery, prioritize auditing `<i>` tags inside interactive elements for missing `aria-label` attributes.
