<?php
	require_once 'include/auth.php';
	require_once 'include/functions.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	$groups = view_user_groups();

	if ($GLOBALS['json_obj']->count_emails) {
		$smarty->assign("count_emails",true);
	} else {
		$smarty->assign("count_emails",false);
	}

	$smarty->assign("groups",$groups);

	$smarty->display("add_campaing.tpl");
?>