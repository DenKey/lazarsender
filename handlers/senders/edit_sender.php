<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit();
	}
 	
 	if (isset($_REQUEST['email']) && isset($_REQUEST['password'])){
 		$email    = $_REQUEST['email'];
		$password = $_REQUEST['password'];
 	}
 	if (isset($_REQUEST['login']) && isset($_REQUEST['service'])){
 		$login    = $_REQUEST['login'];
		$service  = $_REQUEST['service'];
 	}
	if (isset($_REQUEST['lastsending'])) {
		$lastsending = $_REQUEST['lastsending'];
	}

	$edit_query = sprintf("UPDATE senders SET email='%s'".
						  " ,password='%s',login='%s',".
		                  " service='%s' ,lastsending='%s' WHERE id=%d",
		                  $email,
		                  $password,
		                  $login,
		                  $service,
		                  $lastsending,
		                  $id);

	$stm =  $pdo->prepare($edit_query);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo true;
?>