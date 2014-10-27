<?php
/**
 * This example shows making an SMTP connection with authentication.
 */
//yolo.babe@aol.uk
//QWERTY123456
//
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require_once './../include/config.php';
require 	 './../phpmailer/PHPMailerAutoload.php';

if (isset($_REQUEST['host']) && isset($_REQUEST['port']) ) {
	$host     = $_REQUEST['host'];
	$port     = $_REQUEST['port'];
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	$email    = $_REQUEST['email'];
	$crypt    = $_REQUEST['crypt'];
} else {
	exit('notfill');
}

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'text';
//Set the hostname of the mail server
$mail->Host = $host;
//Set the SMTP port number - likely to be 25, 465 or 587//
if ($crypt != "ssl") {
	$mail->SMTPSecure = $crypt;
}     
$mail->Port = $port;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = $username;
//Password to use for SMTP authentication
$mail->Password = $password;
//Set who the message is to be sent from
$mail->setFrom($username);
//Set an alternative reply-to address
$mail->addReplyTo($username);
//Set who the message is to be sent to
$mail->addAddress($email);
//Set the subject line
$mail->Subject = 'Hello is a SMTP settings test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<b>Thanks for using LazarSender, if you see this message it means you SMTP settings correct.</b>');
//Replace the plain text body with one created manually
$mail->AltBody = 'Thanks for using LazarSender, if you see this message it means you SMTP settings correct.';
//Attach an image file


//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";

}
