## 2025-01-27 - [Hidden Content Image Loading]
**Learning:** The application injects content for all sections (Experience, Projects) immediately on load, even if they are hidden via `display: none` classes. This causes browsers to download large images (up to 3.6MB) that are not visible to the user.
**Action:** Always use `loading="lazy"` for images in dynamically generated content, especially if it's for tabbed/hidden sections.
