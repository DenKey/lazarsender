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
		
	paging($_PAGING,$smarty);  // set variables and settings for paging, from view_config.php

	$smarty->display("services.tpl");			
?>