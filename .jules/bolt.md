# Bolt's Journal

## 2025-02-03 - [Hidden DOM Injection & Bandwidth Waste]
**Learning:** This application simulates SPA routing by toggling visibility of pre-loaded or eagerly-injected `div` sections (e.g., `#experience`, `#projects`). Content for these sections is injected into the DOM via jQuery on `$(document).ready`. Because browsers eagerly download `<img>` resources even inside `display: none` containers, this architecture causes significant bandwidth waste by downloading assets for pages the user may never visit.
**Action:** Always verify if "hidden" content in single-page-like sites is actually deferring resource loading. If the DOM is present, the browser is likely downloading it. Apply `loading="lazy"` to all images in these hidden sections to align resource loading with user interaction.
