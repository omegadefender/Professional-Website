<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST["name"]);
    $emailaddress = htmlspecialchars($_POST["emailaddress"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["body"]);
}

$mail = new PHPMailer(true);
$address = getenv('GMAIL_USERNAME');
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host       = 'smtp.mailgun.org';
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv("MAILGUN_SMTP_LOGIN");
    $mail->Password   = getenv('MAILGUN_SMTP_PASSWORD');
    $mail->SMTPSecure = 'tls';
    $mail->Port       = getenv('MAILGUN_SMTP_PORT');
    $mail->From       = getenv('GMAIL_USERNAME');
    $mail->FromName   = 'Mailgun';
    $mail->addAddress(getenv('GMAIL_USERNAME')); // Add a recipient
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "Hi James <br> You got a new message from $name<br><br>Who wrote...<br> $message<br>Their email
     address: $emailaddress";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent<br><br>Click <a href="../index.html">here</a> to go back to the homepage';
?>