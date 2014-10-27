<?php
	require_once 'include/auth.php';
	require_once 'include/config.php';
	require_once 'include/db_connect.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';


	
	$smarty->display("tools.tpl");
?>
