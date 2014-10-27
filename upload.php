<?php
	require_once 'include/auth.php';
	require_once 'include/config.php';
	require_once 'include/db_connect.php';
	require_once 'include/functions.php';

	$select_group = NULL;
	$new_group_name = NULL;

	////////////обработка запросов////////////
	if (isset($_REQUEST['select_group'])) {
		$select_group = $_REQUEST['select_group'];
	}

	if (isset($_REQUEST['create_group'])) {
		$new_group_name = trim($_REQUEST['create_group']);
	}

	if (!empty($new_group_name)) {	
		$select_group = add_emails_group($new_group_name);
	}
	///////////////////////////////////////

	##### Секция работы с файлом ############
	$array = array();
	$now = time();

	$upload_filename = sprintf("%s".LOG_PATH."%d_%s",
								SITE_ROOT,$now,$_FILES['filename']['name']);	

	if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
		move_uploaded_file($_FILES['filename']['tmp_name'], $upload_filename);
	} else {
		logging("Error loading file",true,__FILE__,__LINE__);
	}

	if(is_readable($upload_filename)){

	$file = fopen($upload_filename, 'rt');

		while ($str = fgets($file,1024)) {
			$array[] = trim($str);
		}

	} else {
		logging("Can't open temporary file.",true,__FILE__,__LINE__);
	}

	fclose($file);

	if(@unlink($upload_filename)){
		logging("Временный файл $upload_filename удален",true,__FILE__,__LINE__);
	} else {
		logging("Временный файл $upload_filename не удален",true,__FILE__,__LINE__);
	}
	##############################################	

	#### Секция работы с БД ################

	$array = emails_filter($array);

	$result = add_emails_to_db($array,$select_group);
	
	header("Location: upload_emails.php?success={$result['success']}&dublicate={$result['dublicate']}");
	########################################
?>