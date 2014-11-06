<?php
	require_once '../../include/auth.php';
	require_once '../../include/config.php';
	require_once '../../include/db_connect.php';

	if (isset($_GET['login'],$_GET['password'],$_GET['email'])) {
		$login = trim($_GET['login']);
		$password = trim($_GET['password']);
		$email = trim($_GET['email']);
	} else {
		exit('notfill');
	}

	$stm = $pdo->prepare("SELECT * FROM admins WHERE login=:login or email=:email");
	$stm->bindParam(":email",$email);
	$stm->bindParam(":login",$login);

	if (!$stm->execute()) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);	
	}

 	if ($stm->rowCount() > 0) {
 		echo "0";
 	} else {

 	$password = crypt($password,$login);	

 	$sth = $pdo->prepare("INSERT INTO admins(login,email,password) VALUES (:login,:email,:password)");
 	$sth->bindParam(":login",$login);
 	$sth->bindParam(":email",$email);
 	$sth->bindParam(":password",$password);

 	if (!$sth->execute()) {
 		logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);	
 	}

	echo "1";
	}
?>