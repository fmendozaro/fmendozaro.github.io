## 2024-05-21 - [Legacy jQuery Accessibility]
**Learning:** Dynamic content generation in legacy jQuery projects often necessitates manual injection of ARIA attributes and alt text within template literals, as modern framework automations are absent.
**Action:** When working with raw HTML strings in JS, explicitly verify and add accessibility attributes (aria-label, alt, role) at the point of string construction.
