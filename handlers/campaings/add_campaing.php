<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

if (isset($_REQUEST['name'],$_REQUEST['select'],$_REQUEST['subject'])) {
		$name     = $_REQUEST['name'];
		$select   = array();
		$subject  = $_REQUEST['subject'];
	
		foreach ($_REQUEST['select'] as $value) {
			$select[] = $value;
		}

			$stm = $pdo->prepare("SELECT * FROM campaings WHERE name=:name");
			$stm->bindParam(":name",$name);
			try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

		 	if ($stm->rowCount() > 0) {
		 		$obj = array('status' => 0,
			 				 'id'     => 0);
				$obj = json_encode($obj);
		 		echo $obj;
		 	} else {
		 	 $sth = $pdo->prepare("INSERT INTO campaings(name,groups,subject)".
								" VALUES (:name,:select,:subject)");
		 	 $sth->bindParam(":name");
		 	 $sth->bindParam(":select",json_encode($select));
		 	 $sth->bindParam(":subject",$subject);
		 	 try {
				$sth->execute();
			} catch (PDOException $e) {
				logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

			 	$campaing_id = $pdo->lastInsertId();

			 	$obj = array('status' => 1,
			 				 'id'     => $campaing_id);

			 	$obj = json_encode($obj);

			 	echo $obj;
		 	}

} else {
	$obj = array('status' => -1,
	 			 'id'     => 0);

	$obj = json_encode($obj);

	exit($obj);
}



?>