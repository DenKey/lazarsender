<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['notes'],$_REQUEST['id'])) {
		$notes = $_REQUEST['notes'];
		$id = $_REQUEST['id'];
	} else {
		exit('fail');
	}



	$stm = $pdo->prepare("UPDATE admins SET notes=:notes WHERE id=:id");
	$stm->bindParam(':notes', $notes);
	$stm->bindParam(':id', $id);
	if ($stm->execute()) {
		echo "success";
	} else {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "error";
	}

?>