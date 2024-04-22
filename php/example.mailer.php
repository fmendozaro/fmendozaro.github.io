<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$from = $_POST["email"];
$name = $_POST["fullName"];
$msg = $_POST["message"];
$subject = $_POST["subject"];

$msgObj = new stdClass();

//    $mail->SMTPDebug = 1;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'domain.com;smtp.domain.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'username';                 // SMTP username
$mail->Password = 'pass';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('mail@mail.com', $from);
$mail->addAddress('mail@mail.com', 'name');     // Add a recipient

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $msg;

if(!$mail->send()) {
    $msgObj->msg = 'Message could not be sent.';
    $msgObj->error = 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $msgObj->msg = 'Message has been sent successfully';
}

header('Content-Type: application/json');
echo json_encode($msgObj);