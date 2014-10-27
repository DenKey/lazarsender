<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['eid'])) {
		$email_id = $_REQUEST['eid'];
	} else {
		exit();
	}

	$email_query =  "DELETE FROM recepients WHERE id=".$email_id;

	$stm =  $pdo->prepare($email_query);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}
?>