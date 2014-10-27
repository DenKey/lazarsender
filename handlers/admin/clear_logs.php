<?php
	require_once '../../include/auth.php';
	require_once '../../include/config.php';

	 if (isset($_REQUEST['log'])) {
	 	$log = $_REQUEST['log'];
	 	if ($log == 0) {  // maillog
	 		file_put_contents(SITE_ROOT.LOG_PATH."mailsender.log", "");
	 		echo "mailsender";
	 	} else if ($log == 1) { // site log
	 		file_put_contents(SITE_ROOT.LOG_PATH."site.log", "");
	 		echo "site";
	 	} else {
	 		logging("Not choise log to clear",true,__FILE__,__LINE__);
	 		echo "notselect";
	 	}

	 } else {
	 	exit('noparams');
	 }

?>