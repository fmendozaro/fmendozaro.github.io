## 2026-02-04 - [Button Triad for Custom Elements]
**Learning:** Custom interactive elements (like `div`s used as buttons) must implement the 'Button Triad': `role='button'`, `tabindex='0'`, and JavaScript `keydown` listeners (Enter/Space) to ensure accessibility.
**Action:** Always audit `onclick` handlers on non-button elements and upgrade them to full semantic buttons or add the triad.
