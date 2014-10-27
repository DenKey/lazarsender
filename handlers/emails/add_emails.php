<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';
	require_once '../../include/functions.php';

	$select_group = NULL;
	$separator = NULL;
	$str_emails = NULL;
	$new_group_name = NULL;
	$emails = array();
	$counters = array();

    ////////////for refactoring////////////
	if (isset($_REQUEST['select_group'])) {
		$select_group = $_REQUEST['select_group'];
	} 
	if (isset($_REQUEST['separator'])) {
		$separator = trim($_REQUEST['separator']);
	} 
	if (isset($_REQUEST['emails'])) {
		$str_emails = $_REQUEST['emails']."\n";   // строка в которую переданы адреса
	}
	if (isset($_REQUEST['create_group'])) {
		$new_group_name = trim($_REQUEST['create_group']);
	}
	///////////////////////////////////////
          
	if ($separator == "" or is_null($separator)) {
		$emails = explode("\n", $str_emails);
	} else {
		$emails = explode($separator, $str_emails);
	}

	foreach ($emails as $key => &$mail) {
		$emails[$key] = trim($mail);
	}
	
	$emails = emails_filter($emails);

    $count = count($emails);
	
	if (!is_null($new_group_name) && !empty($new_group_name)) {	
		$select_group = add_emails_group($new_group_name);
	}

	$counters = add_emails_to_db($emails,$select_group);

	echo "Добавлено {$counters['success']}. Дубликатов {$counters['dublicate']}";
?>