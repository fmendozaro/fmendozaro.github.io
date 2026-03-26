## 2024-03-25 - [Lazy Loading Hidden SPA Sections]
**Learning:** The application simulates a Single Page Application by rendering all sections (like `#projects`, `#experience`) immediately on `$(document).ready` but keeping them visually hidden using CSS (`.hide`). This causes the browser to download all large images (e.g., 3MB cohort images) on initial page load, blocking the main thread and wasting bandwidth for content the user hasn't requested.
**Action:** Always apply `loading="lazy"` to images within hidden SPA sections or dynamically generated content that is not immediately visible. This defers the network request until the section is displayed.

## 2024-05-18 - Convert images to WebP
**Learning:** Legacy image formats (JPEG, PNG) used for dynamic content (projects, cohorts) account for massive payload sizes (8.3MB and 9.4MB respectively in this app). WebP conversion reduces these sizes dramatically (~2MB and ~1.6MB respectively) while maintaining visual quality, substantially improving load times for image-heavy hidden sections when they are requested.
**Action:** Default to modern image formats like WebP or AVIF for new media assets. When optimizing, target directories with unoptimized images (`img/projects/` and `img/cohorts/`) as they offer the highest ROI for payload size reduction.
