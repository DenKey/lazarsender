<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

 	if (isset($_POST['login'],$_POST['email'],$_POST['id'])){
 		$login = $_POST['login'];
 		$email    = $_POST['email'];
 		$id = $_POST['id'];
 		if (isset($_POST['password']) && $_POST['password'] != "") {
 			$password   = crypt(trim($_POST['password']),$login);
 		}
 	} else {
 		exit('notfill');
 		logging("One from parametrs not fill ",true,__FILE__,__LINE__);
 	}

 	if (isset($_POST['password']) && $_POST['password'] != "") {
 		$stm = $pdo->prepare("UPDATE admins SET login=:login,email=:email,password=:password WHERE id=:id");
 		$stm->bindParam(":login",$login);
 		$stm->bindParam(":email",$email);
 		$stm->bindParam(":password",$password);
 		$stm->bindParam(":id",$id);
		if (!$stm->execute()) {
			logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		}
 	} else {
 		$stm = $pdo->prepare("UPDATE admins SET login=:login, email=:email WHERE id=:id");
 		$stm->bindParam(":login",$login);
 		$stm->bindParam(":email",$email);
 		$stm->bindParam(":id",$id);
		if (!$stm->execute()) {
			logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		}
 	}


	echo true;
?>