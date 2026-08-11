<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// 🛡️ Sentinel: Input Sanitization
// Sanitize inputs to prevent XSS and header injection
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_POST["fullName"] ?? '', ENT_QUOTES, 'UTF-8');
$msg = htmlspecialchars($_POST["message"] ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST["subject"] ?? '', ENT_QUOTES, 'UTF-8');

$msgObj = new stdClass();

// $mail->SMTPDebug = 1; // Enable verbose debug output

$mail->isSMTP();
// 🛡️ Sentinel: Use Environment Variables for Secrets
// Never commit credentials to version control
$mail->Host = getenv('SMTP_HOST') ?: 'smtp.example.com';
$mail->SMTPAuth = true;
$mail->Username = getenv('SMTP_USER') ?: 'user@example.com';
$mail->Password = getenv('SMTP_PASS') ?: 'secret';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Note: Using the user's email as the 'From' name might be confusing,
// but preserving original logic with sanitized input.
$mail->setFrom('mail@mail.com', $from);
$mail->addAddress('mail@mail.com', 'name');

$mail->isHTML(true);

$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // 🛡️ Sentinel: Generic Error Message
    // Do not expose internal error details (stack traces/config) to the client
    error_log('Mailer Error: ' . $mail->ErrorInfo); // Log internally
    $msgObj->error = 'An error occurred while sending the message.';
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
