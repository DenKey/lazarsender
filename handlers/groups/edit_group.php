<?php
	require_once '../../include/auth.php';
	require_once '../../include/functions.php';

	if (isset($_REQUEST['id']) && isset($_REQUEST['newname'])) {
	   $group_id = $_REQUEST['id'];
	   $new_name = $_REQUEST['newname']	;
	} else {
		exit();
	}

	$stm =  $pdo->prepare("UPDATE groups SET group_name=:new_name WHERE id=:group_id");
	$stm->bindParam(":new_name",$new_name);
	$stm->bindParam(":group_id",$group_id);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}
?>
