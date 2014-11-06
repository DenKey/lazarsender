<?php
   require_once 'include/auth.php';
	require_once 'include/config.php';
   require_once 'include/db_connect.php';

   require_once 'include/classes/paging.php';
   require_once 'libs/Smarty.class.php';
   $smarty = new Smarty();
   require_once 'include/view_config.php';


   if ($GLOBALS['json_obj']->count_emails) {
      $smarty->assign("count_emails", true);
   } else {
      $smarty->assign("count_emails", false);
   }  

   
   $smarty->assign("accounts_number",$GLOBALS['json_obj']->accounts_number);
   $smarty->assign("groups_number",$GLOBALS['json_obj']->groups_number);
   $smarty->assign("emails_number",$GLOBALS['json_obj']->emails_number);
   $smarty->assign("service_number",$GLOBALS['json_obj']->service_number);
   $smarty->assign("campaings_number",$GLOBALS['json_obj']->campaings_number);
   $smarty->assign("test_email",$GLOBALS['json_obj']->test_email);

            
   $_PAGING = new Paging($pdo,10);

   $r = $_PAGING->get_page("SELECT * FROM admins");

   $admins = array();

   foreach ($r as $user) {

   $admins[] = array('id'    =>  $user['id'],
                     'login' =>  $user['login'],
                     'email' =>  $user['email'],
                     'group' =>  $user['group'],
                     'login' =>  $user['login']);

   } 

   $smarty->assign("admins",$admins);

   paging($_PAGING,$smarty);  // set variables and setting for paging, from view_config.php

   $smarty->display("settings.tpl");
?>