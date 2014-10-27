<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		$id = NULL;
		exit();
	}

	$q_group_delete = "DELETE FROM groups WHERE id=".$id;

	$stm =  $pdo->prepare($q_group_delete);
		 	try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

	$q_group_mails_delete = "DELETE FROM recepients WHERE mail_group=".$id;

	$sth =  $pdo->prepare($q_group_mails_delete);
		 	try {
				$sth->execute();
			} catch (PDOException $e) {
				logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

	echo true;
?>