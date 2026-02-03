<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// 🛡️ Sentinel: Sanitize inputs to prevent XSS and Header Injection
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$name = htmlspecialchars($_POST["fullName"] ?? '', ENT_QUOTES, 'UTF-8');
$msg = htmlspecialchars($_POST["message"] ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST["subject"] ?? '', ENT_QUOTES, 'UTF-8');

$msgObj = new stdClass();

// $mail->SMTPDebug = 0;                               // Disable debug output in production

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'domain.com;smtp.domain.com';           // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication

// 🛡️ Sentinel: Use environment variables for sensitive credentials
$mail->Username = getenv('SMTP_USERNAME');            // SMTP username
$mail->Password = getenv('SMTP_PASSWORD');            // SMTP password

$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mail@mail.com', $from);
$mail->addAddress('mail@mail.com', 'name');           // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // 🛡️ Sentinel: Don't expose internal error details in production
    $msgObj->error = 'Mailer Error: Please contact support.';
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
