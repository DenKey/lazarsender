<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_POST['id'])) {
		$id = $_POST['id'];
	} else {
		exit();
	}
 	
 	if (isset($_POST['login']) && isset($_POST['email'])){
 		$login = $_POST['login'];
 		$email    = $_POST['email'];
 		if (isset($_POST['password']) && $_POST['password'] != "") {
 			$password   = crypt(trim($_POST['password']),$login);
 		}
 	} else {
 		exit('notfill');
 		logging("One from parametrs not fill ",true,__FILE__,__LINE__);
 	}

 	$sql_le = sprintf("UPDATE admins SET login='%s',email='%s' WHERE id='%s'",
 					   $login,
 					   $email,
 					   $id);

 	$sql_lep = sprintf("UPDATE admins SET login='%s',email='%s',password='%s' WHERE id='%s'",
 					   $login,
 					   $email,
 					   $password,
 					   $id);

 	if (isset($_POST['password']) && $_POST['password'] != "") {
 		$stm = $pdo->prepare($sql_lep);
		if (!$stm->execute()) {
			logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		}
 	} else {
 		$stm = $pdo->prepare($sql_le);
		if (!$stm->execute()) {
			logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		}
 	}


	echo true;
?>