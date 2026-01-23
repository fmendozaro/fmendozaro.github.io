## 2026-01-23 - [Large Static Assets]
**Learning:** The `img/cohorts/` directory contains unoptimized images (e.g., Xanadu at 3.6MB). The application manually constructs HTML strings in `js/main.js` to render these.
**Action:** Always check asset sizes in this repo. Lazy loading is critical here due to the lack of an image optimization pipeline.
