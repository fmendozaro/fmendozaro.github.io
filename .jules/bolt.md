## 2026-01-20 - [Images inside Hidden Divs Still Load Eagerly]
**Learning:** Browsers may still eagerly download images inside `display: none` containers (like `.hide` in Materialize CSS) if they are present in the DOM.
**Action:** Always apply `loading="lazy"` to images in hidden sections (static or dynamic) to ensure the browser defers downloading them until they are needed/visible.
