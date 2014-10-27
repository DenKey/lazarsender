<?php
	require_once 'include/auth.php';
	require_once 'include/db_connect.php';

	require_once 'include/classes/paging.php';
	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';


	$services_per_page = $GLOBALS['json_obj']->service_number;

	$_PAGING = new Paging($pdo,$services_per_page);

	$r = $_PAGING->get_page("SELECT * FROM services");			

	$services = array();

	foreach ($r as $result) {

		$services[] = array('id'       =>  $result['id'],
							'service'  =>  $result['service'],
							'server'   =>  $result['server'],
							'port'     =>  $result['port'],
							'daylimit' =>  $result['daylimit'],
							'crypt'    =>  $result['crypt']);
	}

	$smarty->assign("services",$services);
		
	$smarty->assign("get_result_text",$_PAGING->get_result_text());
	$smarty->assign("get_prev_page_link",$_PAGING->get_prev_page_link());
	$smarty->assign("get_page_links",$_PAGING->get_page_links());

	$smarty->display("services.tpl");			
?>