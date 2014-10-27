<?php
	// функция логирования первый параметр само сообщение, второй если true
	// пишет site.log ,false = mailsender.log
	// logging("Error",true,__FILE__,__LINE__);
	function logging($msg,$site_or_mail,$file = '',$line =''){
		$date = date('Y-m-d  G:i:s');
		$error_str = "File: '$file' Line: $line \n";
		$date_str  = "$date \n";

		if ($site_or_mail) {
			error_log($error_str.$date_str.$msg."\n\n", 3, SITE_ROOT.LOG_PATH.'site.log');
		} else {
			error_log($error_str.$date_str.$msg."\n\n", 3, SITE_ROOT.LOG_PATH.'mailsender.log');
		}
	}

	function handle_error($user_error_message = NULL, $system_error_message = NULL) { 
		  header("Location: show_error.php?" . 
		         "error_message={$user_error_message}&" .  
		         "system_error_message={$system_error_message}"); 
		  exit(); 
	} 

	function super_err($msg,$site_or_mail,$file = '',$line =''){
		logging($msg,$site_or_mail,$file,$line);
		handle_error($msg);
	}
?>