<?php
	require_once "include/auth.php";
	require_once "include/config.php";

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	if (isset($GLOBALS['json_obj']->test_email)) {
		$test_email = $GLOBALS['json_obj']->test_email;
	} else {
		$test_email = NULL;
	}

	$smarty->assign("test_email",$test_email);

	$smarty->display('smtp_test.tpl');
?>
