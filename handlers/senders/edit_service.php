<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit();
	}
 	
 	if (isset($_REQUEST['server']) && isset($_REQUEST['port'])){
 		$server = $_REQUEST['server'];
		$port   = $_REQUEST['port'];
 	} else {
 		exit();
 	}
 	if (isset($_REQUEST['daylimit']) && isset($_REQUEST['service'])){
 		$daylimit    = $_REQUEST['daylimit'];
		$service  = $_REQUEST['service'];
 	}
 	if (isset($_REQUEST['crypt'])){
 		$crypt    = $_REQUEST['crypt'];
 	} else {
 		exit();
 	}
	
	

	$edit_query = sprintf("UPDATE services SET server='%s'".
						  " ,port='%d',daylimit='%d',crypt='%s',".
		                  " service='%s' WHERE id=%d",
		                 $server,
		                 $port,
		                 $daylimit,
		                 $crypt,
		                 $service,
		                 $id);

 	$stm =  $pdo->prepare($edit_query);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo true;
?>