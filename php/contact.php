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
    echo "<h3>Your email has been sent!</h3><p>Thanks for contacting me. I'll get back to you as soon as I can</p><br>
    <p>Click <a href='../index.html'>here</a> to go back to my homepage</p>";
}
?>