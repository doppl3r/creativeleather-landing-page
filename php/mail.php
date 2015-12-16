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
$mail->setFrom($_REQUEST['email'], $_REQUEST['name']);
//Set who the message is to be sent to
$mail->addAddress('info@varitecsolutions.com');
$mail->addAddress('deben3@gmail.com');
//Set the subject line
$mail->Subject = 'New Contact form filled out!';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$message =  '<div style="padding: 64px; background-color: #9ebc42; border-bottom: 4px solid #83a90d; max-width: 480px; margin: 0 auto; text-align: center;">'.
            '<p style="color: #fff; font-size: 24px;"><strong>Somebody wants to contact you!</strong></p>'.
            '<p style="color: #fff; font-size: 24px;"><strong>Name:</strong> '.$_REQUEST['name'].'</p>'.
            '<p style="color: #fff; font-size: 24px;"><strong>Email Address:</strong> '.$_REQUEST['email'].'</p>'.
            '<p style="color: #fff; font-size: 24px;"><strong>Phone:</strong> '.$_REQUEST['usrtel'].'</p>'.
            '<p style="color: #fff; font-size: 24px;"><strong>Comment:</strong> '.$_REQUEST['comment'].'</p>'.
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
