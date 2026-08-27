<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

// Sentinel: Input Sanitization
$from = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$name = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_SPECIAL_CHARS);
$msg = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);

$msgObj = new stdClass();

if (!$from || !$name || !$msg || !$subject) {
    $msgObj->msg = 'Invalid input.';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

// $mail->SMTPDebug = 1;                              // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = getenv('SMTP_HOST') ?: 'smtp.domain.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
// Sentinel: No hardcoded secrets
$mail->Username = getenv('SMTP_USERNAME');            // SMTP username
$mail->Password = getenv('SMTP_PASSWORD');            // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(getenv('SMTP_USERNAME') ?: 'mail@mail.com', $name);
$mail->addAddress(getenv('CONTACT_EMAIL') ?: 'mail@mail.com', 'Admin');     // Add a recipient
$mail->addReplyTo($from, $name);

$mail->isHTML(false);                                 // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    // Sentinel: Do not leak internal error details
    error_log('Mailer Error: ' . $mail->ErrorInfo);
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
