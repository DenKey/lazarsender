<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

if (isset($_REQUEST['name']) && isset($_REQUEST['select']) && isset($_REQUEST['subject'])) {
		$name     = $_REQUEST['name'];
		$select   = array();
		$subject  = $_REQUEST['subject'];
	
		foreach ($_REQUEST['select'] as $value) {
			$select[] = $value;
		}

			$check_query = sprintf("SELECT * FROM campaings WHERE name='%s'",
		 							$name);
			$stm = $pdo->prepare($check_query);
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
		 		$insert_query = sprintf("INSERT INTO campaings(name,groups,subject)".
								" VALUES ('%s','%s','%s')",
								$name,
								json_encode($select),
								$subject);
		 	 $sth = $pdo->prepare($insert_query);
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