<?php
require("class.phpmailer.php");

function sendmail($to, $subject, $message){

$mailer = new PHPMailer();

$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = 'ssl';
$mailer->Host = 'smtp.gmail.com';
$mailer->Port = 465;
$mailer->Username = "bccurry7@gmail.com";  
$mailer->Password = "encrypted22";  
$mailer->From = 'bccurry7@gmail.com';
$mailer->FromName = 'base-G Admin';
$mailer->Subject = $subject;
$mailer->Body = $message;
$mailer->AddAddress($to);
  
if(!$mailer->Send())
{
   echo "Message was not sent<br/ >";
   echo "Mailer Error: " . $mailer->ErrorInfo;
}
else
{
   //echo "Message has been sent";
}
}
?>
