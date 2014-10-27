<?php  
	require_once 'libs/Smarty.class.php';

	$smarty = new Smarty();

	require_once 'include/view_config.php';

	session_start();
	if(isset($_SESSION['user_id'])){
 		 header("Location: home.php");
	}

$smarty->display('index.tpl');

?>