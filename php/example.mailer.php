<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// ⚡ Bolt: Security - Input validation and sanitization
// Use filter_var with $_POST to allow testing in CLI and standard validation
$from = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
$name = filter_var($_POST['fullName'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
// Prevent XSS in email body
$msg = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);
$subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_SPECIAL_CHARS);

$msgObj = new stdClass();

if (!$from || !$msg || !$subject) {
    $msgObj->msg = 'Invalid input provided.';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

// ⚡ Bolt: Security - Use environment variables for secrets
$smtpHost = getenv('SMTP_HOST');
$smtpUser = getenv('SMTP_USER');
$smtpPass = getenv('SMTP_PASS');

if (!$smtpHost || !$smtpUser || !$smtpPass) {
    $msgObj->msg = 'Server configuration error.';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->SMTPAuth = true;
$mail->Username = $smtpUser;
$mail->Password = $smtpPass;
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($from, $name);
$mail->addAddress(getenv('MAIL_TO') ?: 'mail@mail.com', 'Admin');

$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // ⚡ Bolt: Security - Log error, don't display to user
    error_log('Mailer Error: ' . $mail->ErrorInfo);
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
