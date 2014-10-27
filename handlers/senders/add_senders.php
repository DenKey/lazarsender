<?php
	require_once '../../include/auth.php';
	require_once '../../include/db_connect.php';
	require_once '../../include/functions.php';

	$auth_separator = NULL;
	$acc_separator = NULL;
	// сырые аккаунты
	$accounts = array(); 
	$str_accounts = NULL;
	// массив аккаунтов готовых к добавлению в бд
	$senders = array();

	if (isset($_REQUEST['auth_separator'])) {
		$auth_separator = $_REQUEST['auth_separator'];
	}
	if (isset($_REQUEST['acc_separator'])) {
		$acc_separator = $_REQUEST['acc_separator'];
	}
	if (isset($_REQUEST['accounts'])) {
		$str_accounts = $_REQUEST['accounts'];
	} else {
		exit();
	}

	// Если аккаунты добавлены построчно без разделителя
	// то разбить массив построчно с помощью символа переноса строки

	if ($acc_separator == "" or is_null($acc_separator)) {
		$accounts = explode("\n", $str_accounts);
	} else {
		$accounts = explode($acc_separator, $str_accounts);
	}


	$senders = formated_sender($accounts,$auth_separator);

	$counters = add_senders_to_db($senders);

	echo "Добавлено {$counters['success']}. Дубликатов {$counters['dublicate']}";
?>