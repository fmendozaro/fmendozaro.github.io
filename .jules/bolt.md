## 2024-05-22 - [Large Unoptimized Images]
**Learning:** The repository contains several multi-megabyte images (up to 3.6MB) committed directly to the codebase. This significantly impacts initial clone time and page load performance for users on slower connections.
**Action:** Future optimizations should involve compressing these images or using a build step to optimize them. For now, lazy loading is the immediate mitigation to improve Time to Interactive.
