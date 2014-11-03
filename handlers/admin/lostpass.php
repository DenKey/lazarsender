<?php
	require_once '../../include/config.php';
	require_once '../../include/db_connect.php';
	require_once '../../phpmailer/class.phpmailer.php';
	require_once '../../phpmailer/extras/class.html2text.php';
	date_default_timezone_set('Etc/UTC');

	if (isset($_GET['login']) && isset($_GET['email'])) {
		$login = $_GET['login'];
		$email = $_GET['email'];
	} else {
		exit('notfill');
	}

	$stm = $pdo->prepare("SELECT login,email FROM admins WHERE login = :login AND email = :email");
	$stm->bindParam(":login",$login);
	$stm->bindParam(":email",$email);

	$stm->execute();

	if ($stm->rowCount() == 1) {
		$time_now = time();
		$hash = crypt($login.$email, $time_now);
	    $today = date("Y-m-d");

		// record into db
		$stn = $pdo->prepare("INSERT INTO reset_password_log(login,email,code,request) VALUES (:login,:email,:code,:today)");
		$stn->bindParam(":login",$login);
		$stn->bindParam(":email",$email);
		$stn->bindParam(":code",$hash);
		$stn->bindParam(":today",$today);
		$stn->execute();

		$sent_status = send_email($login,$email,$hash); 
		if ($sent_status == "sent") {
			echo "sent";
		} elseif ($sent_status == "error") {
			echo "mailerror";
		}
	} else {
		echo "nothing";
	}

function send_email($login,$email,$hash){

	$subject = "Сброс пароля LazarSender";

	$letter =<<<EOD
	<p>Здраствуйте <b>{$login}</b> вы запросили сброс пароля на сайте {$_SERVER['SERVER_NAME']}<p>
	<p>Чтобы сбросить пароль перейдите <a href="http://{$_SERVER['SERVER_NAME']}/?lsps={$hash}">по ссылке</a></p>
	<p>Cсылка активна в течении текущих суток</p>
	<p>Если вы не давали такого запроса просто проигнорируйте данное сообщение</p>
EOD;

	$html2text = new Html2Text($letter);
	$alt_message = $html2text->get_text();
	//Create a new PHPMailer instance
	$mail = new PHPMailer();
	$mail->CharSet = 'UTF-8';
	//Set who the message is to be sent from
	$mail->setFrom("daemon@{$_SERVER['SERVER_NAME']}");
	//Set an alternative reply-to address
	//$mail->addReplyTo('replyto@example.com', 'First Last');
	//Set who the message is to be sent to
	$mail->addAddress($email);
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
		   return "error";
		} else {
		   return "sent";
		}
}
?>