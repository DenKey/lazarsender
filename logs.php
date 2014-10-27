<?php
	require_once 'include/auth.php';
	require_once 'include/config.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	
	$link_maillog = SITE_ROOT.LOG_PATH."mailsender.log";
	$link_sitelog = SITE_ROOT.LOG_PATH."site.log";

	if (file_exists($link_maillog)) {
		$mail_log = file_get_contents($link_maillog);
		$site_log = file_get_contents($link_sitelog);

		$smarty->assign("mail_log",$mail_log);
		$smarty->assign("site_log",$site_log);
	}

	
	$smarty->display("logs.tpl");
?>
