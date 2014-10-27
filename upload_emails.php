<?php
	require_once 'include/auth.php';
	require_once 'include/db_connect.php';
	require_once 'include/functions.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';
	
	if (isset($_REQUEST['success']) or isset($_REQUEST['dublicate'])) {
		$success   = $_REQUEST['success'];
		$dublicate = $_REQUEST['dublicate'];

		$success_str = sprintf("Успешно добавлено %d.Дубликатов %d",
						$success,
						$dublicate);
		$smarty->assign("success_str",$success_str);
	}

	$groups_array = view_user_groups();

	$smarty->assign("groups_array",$groups_array);

	if ($GLOBALS['json_obj']->count_emails) {
		$smarty->assign("count_emails",true);
	} else {
		$smarty->assign("count_emails",false);
	}

	$smarty->display("upload_emails.tpl");
?>