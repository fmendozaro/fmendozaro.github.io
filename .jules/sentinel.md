# SENTINEL'S JOURNAL - CRITICAL LEARNINGS ONLY

## 2024-05-22 - Unprotected External Links (Tabnabbing)
**Vulnerability:** Widespread use of `target="_blank"` without `rel="noopener noreferrer"` in both static HTML and dynamically generated JavaScript content.
**Learning:** The application heavily links to external resources (social media, projects) in new tabs. Missing the `rel` attribute allows the target page to manipulate the `window.opener` object, potentially redirecting the user's origin page to a malicious site.
**Prevention:** Always pair `target="_blank"` with `rel="noopener noreferrer"`.
