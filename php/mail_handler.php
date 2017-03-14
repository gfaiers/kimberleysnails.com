<?php
$name = ucwords(strtolower($_POST['name']));
$email = strtolower($_POST['email']);
$message = $_POST['message'];
$my_email = "kim@kimberleysnails.com";
$subject = "Contact Me @kimberleysnails.com";
$headers = "From: " . $email;
$headers2 = "From: " . $my_email;
if (strlen($name) <= 2) {
    die('B');
}
if (strlen($email) <= 5) {
    die('C');
}
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)) {
    die('C');
}
if (strlen($message) <= 9) {
    die('D');
}
$message = "$name has contacted you via yoursite.

Message: $message";
$message2 = "This is an automated response.  Please do not reply to this response.

Your name: $name.

Your message: $message.

I'll do my best to get in touch with you regarding this as soon as possible.

Many thanks,
Kimberley Booker
KimberleysNails.com";
mail($my_email, $subject, $message, $headers);
mail($email, $subject, $message2, $headers2);
die("A");