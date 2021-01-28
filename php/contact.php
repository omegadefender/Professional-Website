<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST["name"]);
    $emailaddress = htmlspecialchars($_POST["email"]);
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
    $mail->FromName   = 'number8websites.com';
    $mail->addAddress(getenv('GMAIL_USERNAME')); // Add a recipient
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "Hi James <br><br> You got a new message from: $name<br>Their email
    address: $emailaddress<br>Who wrote...<br><br> $message";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    if(isset($_POST["name"]) && $name !== '') {
        $name = htmlspecialchars($_POST["name"]);
        $mail->send();
        echo 'Message has been sent<br><br><a href="../index.html">Click here</a> to go back to the homepage';
     } else {
         echo 'Your message has NOT been sent!<br>
         You forgot to fill in your name<br><br><a href="../html/contact.html">Click here</a> to go back to the form';
     }

?>