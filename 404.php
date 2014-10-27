<?php
  	require_once 'libs/Smarty.class.php';

	$smarty = new Smarty();

	require_once 'include/view_config.php';


	$smarty->display("404.tpl");
?>