<?php
  	require_once 'include/auth.php';
    require_once 'libs/Smarty.class.php';
    $smarty = new Smarty();
    require_once 'include/view_config.php';
  	require_once 'include/db_connect.php';

    $id  = $_SESSION['user_id'];
    $stm = $pdo->prepare("SELECT notes FROM admins WHERE id=?");
    $stm->execute(array($id));
    $notes = $stm->fetchColumn();

    $smarty->assign("notes", $notes);
    $smarty->assign("script_version",$GLOBALS['json_obj']->script_version);
  
    $smarty->display("home.tpl");
?>