# Palette's Journal

## 2025-01-16 - Dynamic Content Accessibility
**Learning:** Dynamic content generated via JS template literals often bypasses standard accessibility checks. Project cards were generated without `alt` text or `aria-label`s.
**Action:** Always verify dynamically generated HTML strings for accessibility attributes (`alt`, `aria-label`, `role`) and security attributes (`rel="noopener noreferrer"` for `target="_blank"`).
