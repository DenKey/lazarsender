<?php
	require_once '../../include/auth.php';
	require_once '../../include/config.php';
	require_once '../../include/db_connect.php';

	if (isset($_GET['login']) && isset($_GET['password']) && isset($_GET['email'])) {
		$login = trim($_GET['login']);
		$password = trim($_GET['password']);
		$email = trim($_GET['email']);
	} else {
		exit('notfill');
	}

	$select_sql = "SELECT * FROM admins WHERE login='$login' or email='$email'";

	$stm = $pdo->prepare($select_sql);

	if (!$stm->execute()) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);	
	}

 	if ($stm->rowCount() > 0) {
 		echo "0";
 	} else {

 	$password = crypt($password,$login);	
 	$insert_sql = "INSERT INTO admins(login,email,password) VALUES ('$login','$email','$password')";	
 	$sth = $pdo->prepare($insert_sql);

 	if (!$sth->execute()) {
 		logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);	
 	}

	echo "1";
	}
?>