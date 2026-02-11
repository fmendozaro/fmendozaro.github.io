## 2025-02-24 - Playwright Click Interception by Overlay
**Learning:** When automating clicks on a menu that has a full-screen overlay (even if fading out), Playwright's strict visibility checks might fail with "intercepts pointer events".
**Action:** Use `force=True` for clicks on elements that might be temporarily covered by overlays or animations during transitions, or ensure explicit waits for the overlay to completely disappear (checking `hidden` state or using `wait_for_timeout` if animation is time-based).
