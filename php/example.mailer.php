<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Sentinel: Use Composer autoloader.
// Note: If vendor folder is missing, run 'composer install'
require '../vendor/autoload.php';

$mail = new PHPMailer(true);

// Sentinel: Validation & Sanitization
// Prevent XSS and Injection by sanitizing inputs
$from = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$name = filter_input(INPUT_POST, 'fullName', FILTER_SANITIZE_SPECIAL_CHARS);
$msg = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_SPECIAL_CHARS);

$msgObj = new stdClass();

if (!$from) {
    $msgObj->msg = 'Invalid email address.';
    $msgObj->error = 'Validation Error';
    header('Content-Type: application/json');
    echo json_encode($msgObj);
    exit;
}

try {
    // Sentinel: Disable verbose debug output in production to prevent data leakage
    // $mail->SMTPDebug = 2;

    $mail->isSMTP();
    $mail->Host = 'domain.com';
    $mail->SMTPAuth = true;

    // Sentinel: Use environment variables for sensitive credentials
    // DO NOT hardcode passwords in source code
    $mail->Username = getenv('SMTP_USERNAME');
    $mail->Password = getenv('SMTP_PASSWORD');

    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($from, $name);
    $mail->addAddress('mail@mail.com', 'Recipient Name'); // Configure as needed

    $mail->isHTML(true);

    $mail->Subject = $subject;
    $mail->Body    = $msg; // Input is sanitized

    $mail->send();
    $msgObj->msg = 'Message has been sent successfully';

} catch (Exception $e) {
    $msgObj->msg = 'Message could not be sent.';
    // Sentinel: Do not expose internal error details to the client
    $msgObj->error = 'Internal Server Error';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
