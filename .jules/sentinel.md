## 2024-05-22 - Secure Email Handling
**Vulnerability:** Hardcoded credentials in `php/example.mailer.php` and missing input sanitization.
**Learning:** Template files with placeholder credentials can encourage insecure practices. Also, `htmlspecialchars` on email subjects breaks display, while `nl2br` is necessary for HTML body content.
**Prevention:** Always use `getenv()` in templates and sanitization functions appropriate for the context (HTML vs Header).