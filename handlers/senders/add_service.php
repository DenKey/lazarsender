<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';


	if (isset($_REQUEST['server']) && isset($_REQUEST['port'])){
 		if (empty($_REQUEST['server']) or empty($_REQUEST['port'])) {
 			exit();
 		}else {
 			$server = $_REQUEST['server'];
			$port   = $_REQUEST['port'];
			$crypt = $_REQUEST['crypt'];
		}
 	} else {
 		exit();
 	}

 	if (isset($_REQUEST['daylimit']) && isset($_REQUEST['service'])){
 		$daylimit    = $_REQUEST['daylimit'];
		$service     = $_REQUEST['service'];
 	}
	
 	$check_query = sprintf("SELECT * FROM services WHERE service='%s'",
 							$service);
 	$stm =  $pdo->prepare($check_query);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

 	if ($stm->rowCount() > 0) {
 		echo "dublicate";
 	} else {
 		
 		$insert_query = sprintf("INSERT INTO services(server,port,daylimit,".
 							"service,crypt) VALUES ('%s','%d','%d','%s','%s')",
 							$server,
 							$port,
 							$daylimit,
 							$service,
 							$crypt);

 		 	$sth =  $pdo->prepare($insert_query);
			try {
				$sth->execute();
			} catch (PDOException $e) {
				logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

 		echo "success";	
 	}
 	
?>