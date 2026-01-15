## 2024-05-22 - Icon-Only Buttons and Accessibility
**Learning:** This codebase heavily utilizes icon-only buttons (especially with Materialize CSS) without providing alternative text for screen readers. This is a recurring pattern in the design system.
**Action:** When working with Materialize CSS icon buttons (`.btn-floating`, `.sidenav-trigger`), always verify and add `aria-label`. Also, ensure `target="_blank"` links are secure and accessible.
