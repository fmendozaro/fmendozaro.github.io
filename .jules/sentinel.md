# Sentinel's Security Journal

## 2026-01-31 - [Reverse Tabnabbing in Static & Dynamic Links]
**Vulnerability:** Found multiple instances of `target="_blank"` without `rel="noopener noreferrer"` in both static HTML (`index.html`) and dynamically generated JavaScript templates (`js/main.js`). This exposes the site to Reverse Tabnabbing attacks where the opened page can manipulate the original page via `window.opener`.
**Learning:** Even in simple static sites or SPAs, external links (social media, portfolios) are common vectors for this vulnerability. Frameworks often handle this, but vanilla JS/HTML requires manual vigilance.
**Prevention:** Always pair `target="_blank"` with `rel="noopener noreferrer"`. Use linters like `eslint-plugin-react` (specifically `jsx-no-target-blank`) or similar HTML linters to catch this automatically.
