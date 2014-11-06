<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = trim($_REQUEST['id']);
	} else {
		exit();
	}

	$stm = $pdo->prepare("DELETE FROM admins WHERE id=:id");
	$stm->bindParam(":id",$id);

	if (!$stm->execute()) {
		echo "not";
		logging("Deleting user failed:".implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
	}

	echo "deleted";
?>