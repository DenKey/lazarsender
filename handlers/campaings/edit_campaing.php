<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

if (isset($_REQUEST['id'],$_REQUEST['name'],$_REQUEST['subject'])) {
		$name     = $_REQUEST['name'];
		$subject  = $_REQUEST['subject'];
		$id 	  = intval($_REQUEST['id']);
	
			$stm =  $pdo->prepare("SELECT * FROM campaings WHERE id=:id");
			$stm->bindParam(":id",$id);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

		 	if ($stm->rowCount() == 0) {
		 		$obj = array('status' => 0);
				$obj = json_encode($obj);
		 		echo $obj;
		 	} else {
		 		$sth =  $pdo->prepare("UPDATE campaings SET name=:name,".
		 							  "subject=:subject WHERE id=:id");
		 		$sth->bindParam(":name",$name);
		 		$sth->bindParam(":subject",$subject);
		 		$sth->bindParam(":id",$id);
			 	try {
					$sth->execute();
				} catch (PDOException $e) {
					logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
					echo "MySql Error.Watch log.";
				}

			 	$obj = array('status' => 1,
			 				'id' => $id);

			 	$obj = json_encode($obj);

			 	echo $obj;
		 	}

} else {
	$obj = array('status' => -1);

	$obj = json_encode($obj);

	exit($obj);
}

?>