<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// 🛡️ Sentinel: Initialize PHPMailer with exceptions enabled
$mail = new PHPMailer(true);

// 🛡️ Sentinel: Sanitize inputs to prevent XSS and Injection
$from = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
// Prevent XSS in email body
$name = htmlspecialchars($_POST['fullName'] ?? '', ENT_QUOTES, 'UTF-8');
$msg = htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8');
$subject = htmlspecialchars($_POST['subject'] ?? '', ENT_QUOTES, 'UTF-8');

$msgObj = new stdClass();

try {
    // $mail->SMTPDebug = 1; // Enable verbose debug output

    $mail->isSMTP();
    // 🛡️ Sentinel: Use environment variables for secrets
    $mail->Host = getenv('SMTP_HOST');
    $mail->SMTPAuth = true;
    $mail->Username = getenv('SMTP_USER');
    $mail->Password = getenv('SMTP_PASS');
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // 🛡️ Sentinel: Prevent header injection/spoofing and set proper Reply-To
    // Send from the authenticated user to avoid SPF/DKIM issues
    $mail->setFrom(getenv('SMTP_USER'), 'Website Contact Form');
    // Add the user's email as Reply-To
    if ($from) {
        $mail->addReplyTo($from, $name);
    }
    // Send to the admin (authenticated user)
    $mail->addAddress(getenv('SMTP_USER'));

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    $mail->send();
    $msgObj->msg = 'Message has been sent successfully';
} catch (Exception $e) {
    $msgObj->msg = 'Message could not be sent.';
    // 🛡️ Sentinel: Do not leak error details to user
    $msgObj->error = 'Mailer Error';
}

header('Content-Type: application/json');
echo json_encode($msgObj);
