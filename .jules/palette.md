## 2024-05-22 - JS Template Literals Missing Accessibility Attributes
**Learning:** JavaScript template literals used to generate dynamic content often lack accessibility (alt text, ARIA labels) and security (rel attributes) attributes, which are easily overlooked compared to static HTML.
**Action:** Always check dynamic content generation scripts (like `js/main.js`) for missing attributes on `img`, `a`, and `button` tags.
