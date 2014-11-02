<?php  
	require_once 'libs/Smarty.class.php';
	require_once 'include/config.php';

	$smarty = new Smarty();

	require_once 'include/view_config.php';

	session_start();
	if(isset($_SESSION['user_id'])){
 		 header("Location: home.php");
	}

	if (isset($_GET['lsps'])) {
		$smarty->assign("code",$_GET['lsps']);
	}

$smarty->assign("script_version",$GLOBALS['json_obj']->script_version);

$smarty->display('index.tpl');

?>