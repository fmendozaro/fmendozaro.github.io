## 2026-01-12 - Icon-Only Buttons Missing ARIA Labels
**Learning:** The application uses several icon-only buttons (like menu triggers and close buttons) without text labels. This makes them inaccessible to screen reader users who rely on text alternatives to understand the function of interactive elements.
**Action:** Always ensure icon-only buttons have a descriptive `aria-label` attribute explaining the action (e.g., "Close menu", "Scroll to top").
