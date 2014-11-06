<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['html_str'],$_REQUEST['id'])) {
		$html_str = $_REQUEST['html_str'];
		$id = $_REQUEST['id'];
	} else {
		exit('fail');
	}

	$stm = $pdo->prepare("UPDATE campaings SET letter=:html_str WHERE id=:id");	$stm->bindParam(":html_str",$html_str);
	$stm->bindParam(":id",$id);
	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	echo "success";
?>