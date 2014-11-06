<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

 if (isset($_REQUEST['id'],$_REQUEST['server'],$_REQUEST['port'],$_REQUEST['daylimit'],$_REQUEST['service'],$_REQUEST['crypt'])){
 		$server   = $_REQUEST['server'];
		$port     = $_REQUEST['port'];
		$id       = $_REQUEST['id'];
 		$daylimit = $_REQUEST['daylimit'];
		$service  = $_REQUEST['service'];
 		$crypt    = $_REQUEST['crypt'];
 	} else {
 		exit("notfill");
 	}

 	$stm =  $pdo->prepare("UPDATE services SET server=:server".
				  ",port=:port,daylimit=:daylimit,crypt=:crypt,".
		          "service=:service WHERE id=:id");
 	$stm->bindParam(":server",$server);
 	$stm->bindParam(":port",$port);
 	$stm->bindParam(":daylimit",$daylimit);
 	$stm->bindParam(":crypt",$crypt);
 	$stm->bindParam(":service",$service);
 	$stm->bindParam(":id",$id);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo true;
?>