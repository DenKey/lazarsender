<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit();
	}

	$select_query = "SELECT * FROM services WHERE id=".$id;

 	$stm =  $pdo->prepare($select_query);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	if ($stm->rowCount() > 0) {
		$row = $stm->fetch();

		$array = array('server'	       => $row['server'],
					   'port'          => $row['port'],
					   'daylimit'  	   => $row['daylimit'],
					   'service'   	   => $row['service'],
					   'crypt'   	   => $row['crypt'] );

		echo json_encode($array);
	} else {
		exit();
	}
	
?>