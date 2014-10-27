<?php
	require_once 'include/auth.php';
	require_once "include/config.php";

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';


	if (isset($_REQUEST['error_message']) or isset($_REQUEST['system_error_message'])) {

		if (isset($_REQUEST['error_message'])) {
			$error_message  =  $_REQUEST['error_message'];
		} else {$error_message = NULL;}

		if (isset($_REQUEST['system_error_message'])) {
			$system_error_message   =  $_REQUEST['system_error_message'];
		} else {$system_error_message = NULL;}
				
	} else {
	    exit();
	}

	$smarty->assign("system_error_message",$system_error_message);
	$smarty->assign("error_message",$error_message);

	$smarty->display("show_error.tpl");
?>