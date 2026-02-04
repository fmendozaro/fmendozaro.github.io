## 2026-02-04 - Secure Defaults for Example Files
**Vulnerability:** `php/example.mailer.php` contained critical XSS and Injection vulnerabilities and hardcoded credentials, despite being an "example".
**Learning:** Developers often copy-paste example files directly into production. Unsafe examples propagate vulnerabilities.
**Prevention:** All code, including examples and templates, must be secure by default. Use `getenv()` for secrets and `filter_var()` for input, even in demos.
