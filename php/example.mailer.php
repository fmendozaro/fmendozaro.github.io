<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Sanitize user inputs to prevent XSS and Header Injection
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
// Sanitize name but keep quotes for display if needed (though often names are plain text)
$name = htmlspecialchars($_POST['fullName'] ?? '', ENT_QUOTES, 'UTF-8');
// Sanitize message body for HTML context
$msg = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');
// Subject should not be HTML encoded as it's a header, but we should strip newlines to prevent injection (PHPMailer does this, but being explicit is good)
// Actually, simple input without HTML entities is better for subject.
$subject = $_POST['subject'] ?? '';

$msgObj = new stdClass();

//    $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'domain.com;smtp.domain.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication

// Load credentials from environment variables for security
$mail->Username = getenv('SMTP_USERNAME') ?: 'username';                 // SMTP username
$mail->Password = getenv('SMTP_PASSWORD') ?: 'pass';                           // SMTP password

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

if ($from) {
    $mail->setFrom('mail@mail.com', $from);
} else {
    // Fallback if email is invalid or missing
    $mail->setFrom('mail@mail.com', 'Contact Form');
}
$mail->addAddress('mail@mail.com', $name ?: 'User');     // Add a recipient, use sanitized name

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
// Preserve line breaks in the HTML body
$mail->Body    = nl2br($msg);

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // Don't leak full error details in production
    $msgObj->error = 'Mailer Error';
    // $msgObj->error = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
