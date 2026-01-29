## 2025-01-29 - Hidden Images Loaded Eagerly
**Learning:** Hidden elements (via `display: none` or `.hide` class) containing `<img>` tags still trigger immediate network requests, causing significant bandwidth usage on initial load.
**Action:** Always apply `loading="lazy"` to images in hidden sections or below the fold to defer loading until they are needed/viewable.
