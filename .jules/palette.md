## 2026-01-26 - Dynamic Content Accessibility
**Learning:** Content injected via JavaScript template literals often bypasses standard accessibility checks. In this app, project cards generated from `PROPS` were missing `alt` text and `aria-labels`, making them invisible or confusing to screen readers despite having visual icons.
**Action:** When auditing `innerHTML` or template literal injections, explicitly grep for `alt=""`, `aria-label=""`, and `role=""` within the string templates to ensure dynamic content meets the same standards as static HTML.
