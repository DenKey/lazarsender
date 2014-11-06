<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';


	if (isset($_REQUEST['server'],$_REQUEST['port'],$_REQUEST['daylimit'],$_REQUEST['service'])){
 		if (empty($_REQUEST['server']) or empty($_REQUEST['port'])) {
 			exit();
 		}else {
 			$server      = $_REQUEST['server'];
			$port        = $_REQUEST['port'];
			$crypt       = $_REQUEST['crypt'];
			$daylimit    = $_REQUEST['daylimit'];
			$service     = $_REQUEST['service'];
		}
 	} else {
 		exit();
 	}

 	$stm =  $pdo->prepare("SELECT * FROM services WHERE service=:service");
 	$stm->bindParam(":service",$service);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

 	if ($stm->rowCount() > 0) {
 		echo "dublicate";
 	} else {
 		
		$sth =  $pdo->prepare("INSERT INTO services(server,port,daylimit,service,crypt) VALUES (:server,:port,:daylimit,:service,:crypt)");
 		$sth->bindParam(":server",$server);
 		$sth->bindParam(":port",$port);
 		$sth->bindParam(":daylimit",$daylimit);
 		$sth->bindParam(":service",$service);
 		$sth->bindParam(":crypt",$crypt);
			try {
				$sth->execute();
			} catch (PDOException $e) {
				logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

 		echo "success";	
 	}
 	
?>