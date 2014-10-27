<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = trim($_REQUEST['id']);
	} else {
		exit();
	}

	$sql =  "DELETE FROM admins WHERE id=$id";
	$stm = $pdo->prepare($sql);

	if (!$stm->execute()) {
		echo "not";
		logging("Deleting user failed:".implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
	}

	echo "deleted";
?>