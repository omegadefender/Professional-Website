<?php

require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$myemailAddress = getenv('GMAIL_USERNAME');
$mgUsername = getenv("MAILGUN_SMTP_LOGIN");
$mgPassword = getenv('MAILGUN_SMTP_PASSWORD');
$mgPort = getenv('MAILGUN_SMTP_PORT');
$from = 'admin@number8websites.com';
$fromName = 'number8websites.com';

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

if($name !== '') {
  $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host       = 'smtp.mailgun.org';
    $mail->SMTPAuth   = true;
    $mail->Username   = $mgUsername;
    $mail->Password   = $mgPassword;
    $mail->SMTPSecure = 'tls';
    $mail->Port       = $mgPort;
    $mail->From       = $from;
    $mail->FromName   = $fromName;
    $mail->addAddress($myemailAddress);
    $mail->isHTML(true);
    $mail->Subject    = $subject;
    $mail->Body       = "Hi James <br><br>New message from: <div style='color: blue;display: inline'>$name</div>
                        <br>Their email address is: <div style='color: blue;display: inline'>$emailaddress</div>
                        <br>And they wrote...</b><br><div style='color: blue'>{$message}</div>";
    $mail->send();
    echo 'Your message has been sent<br><br><a href="../index.html">Click here</a> to go back to the homepage';
} else {
    echo 'Your message has NOT been sent!<br>
    You forgot to fill in your name<br><br><a href="../html/contact.html">Click here</a> to go back to the form';
}

?>