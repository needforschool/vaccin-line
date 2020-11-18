<?php
//php code to send mail, 
//author : idrish laxmidhar
//Use this code to send a test mail from your localhost.
 
$to = "gani.76@hotmail.fr";
$subject = "Hi!";
$body="test".PHP_EOL;
$body.="Hello World. If all went well then you can see this mail in your Inbox".PHP_EOL;
$body.="Regards".PHP_EOL;
$body.="Idrish Laxmidhar".PHP_EOL;
$body.="http://i-tech-life.blogspot.com".PHP_EOL;
 
$headers = "From: test@localhost.com"; 
 
if (mail($to, $subject, $body, $headers)) {
echo("Message successfully sent!
");
} else {
echo("Message delivery failed...
");
}
?>

