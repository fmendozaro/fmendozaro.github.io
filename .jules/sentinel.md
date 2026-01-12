## 2024-10-25 - Tabnabbing via target="_blank"
**Vulnerability:** Found multiple anchor tags and dynamically generated links using `target="_blank"` without `rel="noopener noreferrer"`.
**Learning:** This exposes the application to "Tabnabbing," where the newly opened page can control the `window.opener` object, potentially redirecting the parent page to a malicious site. This often exists because developers want to open links in new tabs for UX but forget the security implication.
**Prevention:** Always pair `target="_blank"` with `rel="noopener noreferrer"` to sever the reference to the opener.
