<?php
	require_once 'include/auth.php';
	require_once 'include/config.php';
	require_once 'include/db_connect.php';
	require_once 'include/functions.php';

	require_once 'include/classes/paging.php';
	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';


	$campaings_per_page = $GLOBALS['json_obj']->campaings_number;

	$_PAGING = new Paging($pdo,$campaings_per_page);
	$r = $_PAGING->get_page("SELECT * FROM campaings");			

	$campaings = array();
	$test_email	 = $GLOBALS['json_obj']->test_email;

	foreach ($r as $result ) {

	$groups = json_decode($result['groups']);
	$group_select_str = return_select_groups($groups);

	$campaings[] = array('id'   			=> $result['id'],
						 'name' 			=> $result['name'],
						 'group_select_str' => $group_select_str,
						 'subject' 			=> $result['subject'],
						 'test_email'       => $test_email,
						 'emails_count'     => $result['emailscount'],
						 'sent_count'       => $result['sentcount'],
						 'circulated'       => $result['circulated']);
	}

	$smarty->assign('campaings',$campaings);

	$smarty->assign("get_result_text",$_PAGING->get_result_text());
	$smarty->assign("get_prev_page_link",$_PAGING->get_prev_page_link());
	$smarty->assign("get_page_links",$_PAGING->get_page_links());

	$smarty->display("campaings.tpl");	
?>