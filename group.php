<?php
	require_once 'include/auth.php';
	require_once 'include/db_connect.php';

	require_once 'include/classes/paging.php';
	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	if (isset($_REQUEST['group_id'])) {
		$group_id = $_REQUEST['group_id'];
	}	else {
		exit();
	}

	$stm = $pdo->prepare("SELECT * FROM recepients WHERE mail_group=? LIMIT 50");
	if (!$stm->execute(array($group_id))) {
		logging("Selecting emails failed",true,__FILE__,__LINE__);
	}
	$count = $stm->rowCount();

	$emails_per_page = intval($GLOBALS['json_obj']->emails_number);

	$_PAGING = new Paging($pdo,$emails_per_page);

	$r = $_PAGING->get_page("SELECT * FROM recepients WHERE mail_group=$group_id");

	$group_emails = array();
		foreach ($r as $row) {
			$group_emails[] = array('id' => $row['id'],
									'email' => $row['email'],
									'created' => $row['created']);
	}

	$smarty->assign("count",$count);
	$smarty->assign("group_emails",$group_emails);

	paging($_PAGING,$smarty);  // set variables and setting for paging, from view_config.php

	$smarty->display("group.tpl");
?>