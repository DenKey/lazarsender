<?php
	 
	function authorize_user(){
    session_start();
    
		if (!isset($_SESSION['user_id']) || !strlen($_SESSION['user_id'])>0) {
    		header('Location: index.php?error_message='.
    		'У вас нет прав доступа для просмотра страницы пожалуйста авторизуйтесь');
    		exit;
	  }

      if (isset($_SESSION['login']) && isset($_SESSION['user_id'])) { 
     		 // Если получен результат, пользователю нужно разрешить доступ. 
     		 // Возвращение управления, чтобы продолжилось выполнение сценария. 
      		 return;
      } 
 		 // Если мы попали сюда, значит соответствий не было ни в одной из групп. 
  	 // Доступ пользователю не разрешен.
      header('Location: index.php?error_message='.
             'Вы не прошли авторизацию для просмотра данной страницы.');
      exit;  
 		}

  authorize_user();
?>