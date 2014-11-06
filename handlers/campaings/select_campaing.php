<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id']) && intval($_REQUEST['id']) ) {
		$id = $_REQUEST['id'];
	} else {
		exit('notfill');
	}

	$stm =  $pdo->prepare("SELECT * FROM campaings WHERE id=:id");
	$stm->bindParam(":id",$id);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

	if ($stm->rowCount() > 0) {
		$row = $stm->fetch();

		$campaing = array('id'	      => $row['id'],
					   	  'name'      => $row['name'],
					      'groups'    => $row['groups'],
					      'subject'   => $row['subject'],
					      'html_str'  => $row['letter']);

	echo json_encode($campaing);
	} else {
		exit('notfill');
	}
	
?>