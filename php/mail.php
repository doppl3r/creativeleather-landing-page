<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Ely Video Mailer</title>
</head>
<body>
<?php
require 'class.phpmailer.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//$mail->isSendmail();
//Set who the message is to be sent from
$mail->setFrom($_REQUEST['email'], $_REQUEST['fname']);
//Set who the message is to be sent to
$mail->addAddress($_REQUEST['email']);
//Set the subject line
$mail->Subject = 'Special Creative Leather Coupon for '.$_REQUEST['fname'].'!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$message =  '<div style="background-color: #fff; max-width: 800px; margin: 0 auto; text-align: center; color: #000; font-size: 18px;">'.
            '<p>Thank you for signing up for our special Coupon '.$_REQUEST['fname'].'!</p>'.
            '<p>Please print and cut out the receipt below to redeem your offer at one of our facilities!</p>'.
            '<img src="../img/coupon.jpg" />'.
            '</div>';
$mail->msgHTML($message);
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo '<script>window.location = "success.html";</script>';
}
?>
</body>
</html>
