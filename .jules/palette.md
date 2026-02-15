## 2024-05-22 - [Dynamic Content Accessibility]
**Learning:** HTML strings generated within JavaScript (e.g., project cards in `js/main.js`) bypass static analysis tools and often miss critical attributes like `alt` text for images and `aria-label` for buttons.
**Action:** When modifying `js/main.js`, explicitly verify that all template literals generating HTML include accessibility attributes.
