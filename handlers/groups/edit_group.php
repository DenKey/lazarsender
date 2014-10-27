<?php
	require_once '../../include/auth.php';
	require_once '../../include/functions.php';

	if (isset($_REQUEST['id']) && isset($_REQUEST['newname'])) {
	   $group_id = $_REQUEST['id'];
	   $new_name = $_REQUEST['newname']	;
	} else {
		exit();
	}

	$update_query = sprintf("UPDATE groups SET group_name='%s' WHERE id=%d",
							$new_name,
					 		$group_id);

	$stm =  $pdo->prepare($update_query);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}
?>
