<?php
function mail_it($to, $sub, $msg, $atch)
{
require_once 'PHPMailer/class.phpmailer.php';
require_once 'const.php';
$mail = new PHPMailer;
$mail->IsSMTP();                                      // Set mailer to use SMTP
$mail->Host = EM_HOST ;  // Specify main and backup server
$mail->Port = EM_PORT;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EM_FROM;                            // SMTP username
$mail->Password = EM_PASS;                           // SMTP password
$mail->SMTPSecure = EM_SECURITY;                            // Enable encryption, 'ssl' also accepted

$mail->From = EM_FROM;
$mail->FromName = EM_FROM_NAME;
$mail->AddAddress($to);               // Name is optional
$mail->Subject = $sub;
$mail->Body    = $msg;
if(isset($atch))
{
$mail->AddAttachment($atch);    
}
if(!$mail->Send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   if(EXIT_ON_ERROR){
   exit;       
   }
}
echo 'Message has been sent';
}
?>
