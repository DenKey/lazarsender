<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['html_str']) && isset($_REQUEST['id'])) {
		$html_str = $_REQUEST['html_str'];
		$id = $_REQUEST['id'];
	} else {
		exit('fail');
	}


	$update_query = sprintf("UPDATE campaings SET letter='%s' WHERE id=%d",
								$html_str,
								$id);	
	$stm = $pdo->prepare($update_query);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo "success";
?>