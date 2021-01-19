<?php
$first_name = '';
$last_name = '';
$emailaddress = '';
$subject = '';
$body  = '';

if(isset($_POST['submit'])) {
    $first_name = htmlspecialchars($_POST["firstname"]);
    $last_name = htmlspecialchars($_POST["lastname"]);
    $emailaddress = htmlspecialchars($_POST["emailaddress"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $body = htmlspecialchars($_POST["body"]);
    echo "<p>The POST variable has been set</p>
    <p>First name is $first_name</p>
    <p>Last name is $last_name</p>
    <p>Email address is $emailaddress</p>
    <p>Email subject is $subject</p>
    <p>Email body is $body</p>";
}
?>