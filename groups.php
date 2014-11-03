<?php
	require_once 'include/auth.php';
	require_once 'include/db_connect.php';
	require_once 'include/functions.php';
	require_once 'include/classes/paging.php';

	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	///////////////////////
    $user_count = NULL;
    $groups     = NULL; 

	$groups_per_page = intval($GLOBALS['json_obj']->groups_number);

	$_PAGING = new Paging($pdo,$groups_per_page);

	$r = $_PAGING->get_page("SELECT * FROM groups");

    /////////////

	foreach ($r as $key => $group) {			
	// Блок просчета количества емеилов в группе
			if ($GLOBALS['json_obj']->count_emails) {

				$group_id_array = array($group['id']);	
							
				$stm = $pdo->prepare("SELECT * FROM  recepients WHERE mail_group =?");

				if (!$stm->execute($group_id_array)) {
					logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				}

				$user_count = $stm->rowCount();
				$user_count = "($user_count)";
			}

		$groups[] = array('id' => $group['id'],
						  'group_name' => $group['group_name'],
						  'user_count' => $user_count);
	}

	$smarty->assign("groups",$groups);
	
 	paging($_PAGING,$smarty);  // set variables and setting for paging, from view_config.php

	$smarty->display("groups.tpl");
?>