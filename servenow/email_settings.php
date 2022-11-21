<?php
$hostserver= "abocent.com";  // required for alternate routing of email
$username = "hello@$hostserver"; // required for alternate routing of email
$password = "Affinity1990?";  // required for alternate routing of email
$setfrom = "hello@$hostserver";
$replyto = "support@$hostserver";
$title ="Abocent Investment";
$port = 587;  // required for alternate routing of email
$protocol = "tls";
$smtp_auth = true;

/*****
Send mail with gmail less secure application
$hostserver= "smtp.gmail.com";  // required for alternate routing of email
$username = "hitmeads@gmail.com"; // required for alternate routing of email
$password = "Affinity1990?";  // required for alternate routing of email
$setfrom = "hitmeads@gmail.com";
$replyto = "hitmeads@gmail.com";
$title ="Abocent Investment";
$port = 465;  // required for alternate routing of email
$protocol = "ssl";
$smtp_auth = true;
****/
?>