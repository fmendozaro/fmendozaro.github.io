## 2026-01-23 - Dynamic Content Accessibility
**Learning:** Dynamic content generation via JavaScript template literals often bypasses standard HTML linting, leading to missed accessibility attributes (alt, aria-label) and security best practices (rel="noopener") even when developers are otherwise diligent.
**Action:** Establish a manual review pattern for all JS `innerHTML` or template string injections to ensure they meet the same accessibility standards as static HTML.
