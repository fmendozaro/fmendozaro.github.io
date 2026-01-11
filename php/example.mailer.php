<?php
// Load Composer's autoloader
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$msgObj = new stdClass();

// Input Validation & Sanitization
$from = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$name = htmlspecialchars($_POST["fullName"] ?? '', ENT_QUOTES, 'UTF-8');
$msg = htmlspecialchars($_POST["message"] ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST["subject"] ?? '', ENT_QUOTES, 'UTF-8');

if (!$from) {
    $msgObj->msg = 'Invalid email address.';
    $msgObj->error = 'Invalid email format';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

try {
    // Server settings
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host = getenv('SMTP_HOST') ?: 'smtp.example.com';    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                                     // Enable SMTP authentication
    $mail->Username = getenv('SMTP_USER') ?: 'user@example.com';// SMTP username
    $mail->Password = getenv('SMTP_PASS') ?: 'secret';          // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                          // TCP port to connect to

    // Recipients
    $mail->setFrom(getenv('MAIL_FROM') ?: 'noreply@example.com', 'Mailer');
    $mail->addAddress(getenv('MAIL_TO') ?: 'admin@example.com', 'Admin');     // Add a recipient
    $mail->addReplyTo($from, $name);

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    $mail->send();
    $msgObj->msg = 'Message has been sent successfully';
} catch (Exception $e) {
    $msgObj->msg = 'Message could not be sent.';
    // Don't expose detailed error info in production
    $msgObj->error = 'Mailer Error';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
