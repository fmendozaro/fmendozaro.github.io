## 2025-01-11 - Hardcoded Credentials and XSS in Mailer Template
**Vulnerability:** Found hardcoded SMTP credential placeholders and Stored XSS vulnerability in `php/example.mailer.php`.
**Learning:** Even "example" or template files can be dangerous if they encourage insecure patterns (like hardcoding passwords) or contain vulnerabilities (like XSS) that developers might copy-paste into production.
**Prevention:** Use environment variables for all secrets, even in examples. Always sanitize user input before outputting it, especially in HTML contexts like email bodies.
