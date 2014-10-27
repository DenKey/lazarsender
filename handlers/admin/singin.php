<?php
	 require_once '../../include/config.php';
	 require_once '../../include/db_connect.php';

	 if (!isset($_SESSION['user_id'])) {

		 	if (isset($_REQUEST['login']) && isset($_REQUEST['password'])) {
		 		$login = trim($_REQUEST['login']);
				$password = trim($_REQUEST['password']);

			 	$select_query = sprintf("SELECT * FROM admins WHERE login= '%s' AND password = '%s';",
	          						  $login,crypt($password,$login));

			  	$stm = $pdo->prepare($select_query);

			  	try {
					$stm->execute();
				} catch (PDOException $e) {
					logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
					echo "MySql Error.Watch log.";
				}

				  if ($stm->rowCount() == 1) {
				  	  session_start();
				      $array = $stm->fetch();

				      $user_id = $array['id'];
				      $_SESSION['user_id'] = $user_id;
				      $_SESSION['login'] = $array['login'];
				      $_SESSION['group'] = $array['group'];
				      setcookie('user_id',$user_id);
				      setcookie('login',$array['login']);
				      setcookie('group',$array['group']);

				      	echo "success";
		         	} 	else {
		           	  	echo "wrong";               
		          	}
			}	
	 } else {
	 	echo "you in system now";
	 }
?>