<?php
	require_once '../../include/config.php';
	require_once '../../include/db_connect.php';
	date_default_timezone_set('Etc/UTC');

	if (isset($_GET['password']) && isset($_GET['code'])) {
		$password = $_GET['password'];
		$code = trim($_GET['code']);
	} else {
		echo json_encode("notfill");
		exit();
	}

	$stm = $pdo->prepare("SELECT * FROM reset_password_log WHERE code = :code");
	$stm->bindParam(":code",$code);
	$stm->execute();

	if ($stm->rowCount() > 0) {
		$record = $stm->fetch();
		
		$newpassword = crypt($password,$record['login']);

		$create_time = $record['request'];
		$today = date("Y-m-d");

		if ($create_time == $today) {
			$stn = $pdo->prepare("UPDATE admins SET password=:password WHERE login=:login");		
			$stn->bindParam(":password",$newpassword);
			$stn->bindParam(":login",$record['login']);
			$stn->execute();

			echo json_encode("success");
		} else {
			echo json_encode("wrong");
		}		
	} else {
		echo json_encode("wrong");
	}
?>

