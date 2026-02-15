## 2026-02-04 - [Hidden Content Lazy Loading]
**Learning:** Adding `loading="lazy"` to images inside `display: none` containers (like Materialize `.hide` divs) is an effective optimization because browsers typically skip loading them until they become visible (layout is calculated). Verification via network request counting is more reliable than visual inspection for these cases.
**Action:** When optimizing "SPA-like" sites that use hidden divs for routing, prioritize lazy loading on those hidden assets and verify by counting initial network requests.
