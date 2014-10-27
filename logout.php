<?php
	session_start();
	unset($_SESSION['user_id']);
	unset($_SESSION['login']);
	unset($_SESSION['group']);
	setcookie('user_id','',time()-365*24*60*60);
	setcookie('login','',time()-365*24*60*60);
	setcookie('group','',time()-365*24*60*60);

	header('Location: index.php');
?>