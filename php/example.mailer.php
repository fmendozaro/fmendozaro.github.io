<?php
use PHPMailer\PHPMailer\PHPMailer;
require '../vendor/autoload.php';

$mail = new PHPMailer;

$from = filter_var($_POST["email"] ?? '', FILTER_VALIDATE_EMAIL);
$name = htmlspecialchars($_POST["fullName"] ?? '', ENT_QUOTES, 'UTF-8');
$msg = htmlspecialchars($_POST["message"] ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST["subject"] ?? '', ENT_QUOTES, 'UTF-8');

$msgObj = new stdClass();

if (!$from || !$name || !$msg || !$subject) {
    $msgObj->msg = 'Invalid input provided.';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

//    $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = getenv('SMTP_HOST') ?: 'smtp.example.com';
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = getenv('SMTP_USER') ?: 'user@example.com';
$mail->Password = getenv('SMTP_PASS') ?: 'secret';
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mail@example.com', $name . ' (' . $from . ')');
$mail->addAddress('mail@example.com', 'Admin');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // Error detail removed for security
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
