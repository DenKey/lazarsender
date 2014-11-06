<?php
	require_once '../../include/auth.php';
    require_once '../../include/config.php';
    require_once '../../include/db_connect.php';
	require_once '../../phpmailer/class.phpmailer.php';
	require_once '../../phpmailer/extras/class.html2text.php';

	if (isset($_REQUEST['id'],$_REQUEST['email'])) {
		$id = $_REQUEST['id'];
		$sendto = $_REQUEST['email'];
	} else {
		exit('fail');
	}
	
	$stm =  $pdo->prepare("SELECT * FROM campaings WHERE id=:id");
	$stm->bindParam(":id",$id);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}
	
	$select = $stm->fetch();

	$groups = json_decode($select['groups']);

	$subject =  $select['subject'];
	
	$letter  = $select['letter'];

	$html2text = new Html2Text($letter);
	$alt_message = $html2text->get_text();


//Create a new PHPMailer instance
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
//Set who the message is to be sent from
//$mail->setFrom('from@example.com', 'First Last');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($sendto);
//Set the subject line
$mail->Subject = $subject;
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($letter);
//Replace the plain text body with one created manually
$mail->AltBody = $alt_message;
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
	// recording to log
	logging($mail->ErrorInfo,false,__FILE__,__LINE__);
    echo "mailererror";
} else {
    echo "sent";
}

?>