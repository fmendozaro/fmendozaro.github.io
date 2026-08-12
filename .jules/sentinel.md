## 2024-05-22 - Insecure Example Templates
**Vulnerability:** `php/example.mailer.php` contained hardcoded credentials and lacked input sanitization, likely serving as a copy-paste source for the production `php/mailer.php` (referenced in JS). This promotes insecure practices for anyone deploying the project.
**Learning:** Example files are often deployed as-is or used as a base for production code. If they contain security flaws (hardcoded secrets, missing sanitization), these flaws propagate to production.
**Prevention:** Ensure example files use environment variables (`getenv`) and secure coding practices (sanitization) so that copied code is secure by default.
