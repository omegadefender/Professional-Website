<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$myAddress = getenv('GMAIL_USERNAME');

function filterInput($input) {
    $data = trim($input);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit'])) {
    $name = filterInput($_POST["name"]);
    $emailaddress = filterInput($_POST["email"]);
    $subject = filterInput($_POST["subject"]);
    $message = filterInput($_POST["body"]);
}

$mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.mailgun.org';
    $mail->SMTPAuth   = true;
    $mail->Username   = getenv("MAILGUN_SMTP_LOGIN");
    $mail->Password   = getenv('MAILGUN_SMTP_PASSWORD');
    $mail->SMTPSecure = 'tls';
    $mail->Port       = getenv('MAILGUN_SMTP_PORT');
    $mail->From       = $myAddress;
    $mail->FromName   = 'number8websites.com';
    $mail->addAddress($myAddress);
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = "Hi James <br><br>New message from: $name
                        <br>Their email address is: $emailaddress
                        <br>And they wrote...<br><br> $message";

    if(isset($_POST["name"]) && $name !== '') {
        $mail->send();
        echo 'Your message has been sent<br><br><a href="../index.html">Click here</a> to go back to the homepage';
     } else {
         echo 'Your message has NOT been sent!<br>
         You forgot to fill in your name<br><br><a href="../html/contact.html">Click here</a> to go back to the form';
     }

?>