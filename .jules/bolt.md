## 2025-02-06 - [Hidden Sections Download Images]
**Learning:** The app uses a "fake" SPA approach where all sections exist in `index.html` but are hidden with `display: none` (via `.hide` class). Browsers still download images in hidden elements, causing massive initial payload (several MBs) for content the user might never see.
**Action:** Always apply `loading="lazy"` to images in these hidden "pages" to defer loading until the user navigates to them (or they are programmatically shown/moved).
