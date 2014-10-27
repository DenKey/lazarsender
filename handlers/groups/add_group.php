<?php
	require_once '../../include/auth.php';
	require_once '../../include/functions.php';

	if (isset($_REQUEST['create_group'])) {
	    $group_name = $_REQUEST['create_group'];
	} else {
		exit();
	}

	add_emails_group($group_name);
?>