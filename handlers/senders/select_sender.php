<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit();
	}

	$stm =  $pdo->prepare("SELECT * FROM senders WHERE id=:id");
	$stm->bindParam(":id",$id);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}
	
	if ($stm->rowCount() > 0) {
		$row = $stm->fetch();

		$array = array('email'	       => $row['email'],
				   	   'password'      => $row['password'],
				       'login'         => $row['login'],
				       'service'   	   => $row['service'],
					   'lastsending'   => $row['lastsending']);

		echo json_encode($array);
	} else {
		exit();
	}
	
?>