<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit();
	}
 	
 	if (isset($_REQUEST['email'],$_REQUEST['password'])){
 		$email    = $_REQUEST['email'];
		$password = $_REQUEST['password'];
 	}
 	if (isset($_REQUEST['login'],$_REQUEST['service'],$_REQUEST['lastsending'])){
 		$login    = $_REQUEST['login'];
		$service  = $_REQUEST['service'];
		$lastsending = $_REQUEST['lastsending'];
	}

	$stm =  $pdo->prepare("UPDATE senders SET email=:email,password=:password,login=:login,".
		           		  "service=:service ,lastsending=:lastsending WHERE id=:id");
	$stm->bindParam(":email",$email);
	$stm->bindParam(":password",$password);
	$stm->bindParam(":login",$login);
	$stm->bindParam(":service",$service);
	$stm->bindParam(":lastsending",$lastsending);
	$stm->bindParam(":id",$id);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo true;
?>