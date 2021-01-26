<?php

require($_SERVER['DOCUMENT_ROOT'].'\vendor\autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$first_name = '';
$last_name = '';
$emailaddress = '';
$message = '';

if(isset($_POST['submit'])) {
    $first_name = htmlspecialchars($_POST["firstname"]);
    $last_name = htmlspecialchars($_POST["lastname"]);
    $emailaddress = htmlspecialchars($_POST["emailaddress"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["body"]);
}

$mail = new PHPMailer(true);
$address = getenv('GMAIL_USERNAME');
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
    $mail->isSMTP(); // Send using SMTP
    $mail->Host       = 'smtp.mailgun.org'; // Set the SMTP server to send through
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = getenv("MAILGUN_SMTP_LOGIN"); // SMTP username
    $mail->Password   = getenv('MAILGUN_SMTP_PASSWORD'); // SMTP password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    $mail->From = getenv('GMAIL_USERNAME');
    $mail->FromName = 'Mailgun';
    $mail->addAddress(getenv('GMAIL_USERNAME')); // Add a recipient

    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = "Hi James <br> You got a new message from $first_name $last_name<br><br>Who wrote...<br> $message<br>Their email
     address: $emailaddress";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';

?>