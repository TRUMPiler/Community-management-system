<?php 
require 'smtp.php';

// Settings
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';

$mail->Host       = "smtp.gmail.com";    // SMTP server example
$mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->Port       = 587;                    // set the SMTP port for the GMAIL server
$mail->Username   = "dashtaxigg@gmail.com";            // SMTP account username example
$mail->Password   = "cgqgsvvqvjwswyyq";            // SMTP account password example

// Content
$mail->setFrom('dashtaxigg@gmail.com');   
$mail->addAddress('naishal036@gmail.com');
$otp=random_int(10000,99999);
$mail->isHTML(true);                       // Set email format to HTML
$mail->Subject = 'OTP for Login';
$mail->Body    = 'login for otp is '.$otp;
$mail->AltBody = 'The login otp is for clients registering on system';

?>
