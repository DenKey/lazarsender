<?php
	require_once 'include/auth.php';
	require_once 'include/functions.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	if (isset($_REQUEST['id']) && intval($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit("notfill");
	}
	
	$sql = "SELECT groups FROM campaings WHERE id=$id";

	$stn = $pdo->prepare($sql);

	$stn->execute();
	$result = $stn->fetch();
	$groups = json_decode($result['groups']);

	$group_select_str = return_select_groups($groups);

	if ($GLOBALS['json_obj']->count_emails) {
		$smarty->assign("count_emails",true);
	} else {
		$smarty->assign("count_emails",false);
	}

	$smarty->assign("group_select_str",$group_select_str);

	$smarty->display("edit_campaing.tpl");
?>