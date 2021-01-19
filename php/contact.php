<?php
$first_name = '';
$last_name = '';
$emailaddress = '';
$to = 'hastings.james.m@gmail.com';
$subject = '';
$message  = '';
$headers = '';

if(isset($_POST['submit'])) {
    $first_name = htmlspecialchars($_POST["firstname"]);
    $last_name = htmlspecialchars($_POST["lastname"]);
    $emailaddress = htmlspecialchars($_POST["emailaddress"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["body"]);
    $headers = "Message sent from $emailaddress";
    mail($to, $subject, $message, $headers);
}
?>