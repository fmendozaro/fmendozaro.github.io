## 2024-05-23 - [Legacy Button Accessibility]
**Learning:** Legacy `div` elements acting as buttons must implement the 'Button Triad': `role='button'`, `tabindex='0'`, and JavaScript `keydown` listeners (Enter/Space) to ensure accessibility.
**Action:** Always check for `div` elements with `click` handlers and ensure they have keyboard support and correct ARIA roles.
