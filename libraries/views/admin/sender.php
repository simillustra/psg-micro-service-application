<?php
$master_email = 'ygllc@outlook.com';
if (!isset($_POST['submit'])) {
    echo "error; you need to submit the form!";
}
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
if (IsInjected($visitor_email)) {
    echo "Bad email value!";
    exit;
}
$email_from = $master_email;
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n" .
    "Here is the phone $phone and the message :\n  $message" .

    $to = $master_email;
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
mail($to, $email_subject, $email_body, $headers);

$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
header('Location: ' . $actual_link . 'index.php?pg=login');

function IsInjected($str)
{
    $injections = array('(\n+)',
        '(\r+)',
        '(\t+)',
        '(%0A+)',
        '(%0D+)',
        '(%08+)',
        '(%09+)'
    );
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if (preg_match($inject, $str)) {
        return true;
    } else {
        return false;
    }
}

?>