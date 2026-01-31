## 2024-05-22 - [Div Buttons & Keyboard Traps]
**Learning:** Found a critical navigation element (`#nav-btn`) implemented as a `div` with only a click handler. This completely excluded keyboard users from the main menu, creating a dead end.
**Action:** When auditing legacy sites, grep for `.click(` or `onclick` attached to non-interactive elements (div, span) and immediately apply the Button Triad: `role="button"`, `tabindex="0"`, and `keydown` listener (Enter/Space).
