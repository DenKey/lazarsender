<?php
	require_once 'db_connect.php';
	require_once 'config.php';
		
	// Функция добавляет в базу новую группу пользователей
	// Принимает имя новой группы
    // Возвращает id созданной группы
	function add_emails_group($name){
		global $pdo;

		$insert_query = "INSERT INTO groups(group_name) VALUES ('$name')";

		$stm = $pdo->prepare($insert_query);
		try {
				$stm->execute();
		} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
		}

		$id = $pdo->lastInsertId();

		 return $id;
	}
	///////////////////////////////////////////////////////


	// Функция извлекает из БД записи групп адресов.
	// Возвращает массив ассоциативных массивов которые содержат
	// записи из БД.
	function view_user_groups(){
		global $pdo;

		$sth = $pdo->prepare("SELECT * FROM groups");
		if(!$sth->execute()){
			logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
		}

		$array = array();

		while ($group = $sth->fetch(PDO::FETCH_ASSOC)) {

			$array[] = array(
				'id' => $group['id'],
				'group_name' => $group['group_name'],
				'created' => $group['created']);

			if ($GLOBALS['json_obj']->count_emails) {
				$id = $group['id'];
				$stn = $pdo->prepare("SELECT * FROM recepients WHERE mail_group =?");
				if (!$stn->execute(array($id))) {
					logging(implode(",",$stn->errorInfo()),true,__FILE__,__LINE__);
				}
				$user_count = $stn->rowCount();

				// вычисляем номер элемента массива с которым мы работаем
				// и добавляем два  новых ключа со значениями
				$current = count($array);
				$array[$current-1]['user_count'] = $user_count;
				$array[$current-1]['user_count_str'] = "($user_count)";
							
			}

		}

		return $array;
	}

	////////////////////////////////////////////////////////////////


	// Функция принимает массив с идентификаторами групп.
	// Возвращает строку хтмл кода выпадающего селектора с именами готового для
	// вставки на страницу

	function return_select_groups($groups){
		global $pdo;
		// массив c названиями групп извлеченный из БД
		$groups_final = array();

		if (empty($groups) or is_null($groups)) {
			return array();
		}
				// на основе массива с идентификаторами групп извлекаем их имена
				// и добавляем в массив $groups_final

					foreach ($groups as $group_id) {
						$select_query = "SELECT * FROM groups WHERE id='$group_id'";

						$stm = $pdo->prepare($select_query);
						try {
							$stm->execute();
						} catch (PDOException $e) {
							logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
							echo "MySql Error.Watch log.";
						}
	
						while ($group = $stm->fetch()) {
								$groups_final[] = $group['group_name'];
						}
					}
				 //////////

					$group_select_str = "<select>";

					foreach ($groups_final as $group) {
						$group_select_str .= "<option>{$group}</option>";
					}

					$group_select_str .= "</select>";

		return $group_select_str;
	}
	/////////////////////////////////////////////////////////////////


	// Функция добавляет емеилы получателей в базу данных
	// Принимает массив адресов и числовой идентификатор группы
	// Возвращает ассоциативный массив, по ключу 'success' содержит
	// количество добавленых адресов, по ключу 'dublicate' количество
	// дубликатов.

	function add_emails_to_db(array $emails,$select_group){

		global $pdo;
		$has_in_db = 0;  // количество дубликатов
		$add_to_db = 0;  // количество успешно добавленых адресов

		foreach ($emails as $key => $value) {

		$select_query = "SELECT * FROM recepients WHERE email='$value' AND mail_group='$select_group'";

		$stm = $pdo->prepare($select_query);
		
		try {
			$stm->execute();
		} catch (PDOException $e) {
			logging("Email not added".$stm->errorInfo(),true,__FILE__,__LINE__);
			echo "MySql Error.Watch log.";
		}
	
		if($stm->rowCount() > 0){
				$has_in_db++;
				continue;
			} else {
			$insert_query = "INSERT INTO recepients(email,mail_group) VALUES ('$value','$select_group')";

				$sth = $pdo->prepare($insert_query);

				try {
					$sth->execute();
				} catch (PDOException $e) {
					logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
					echo "MySql Error.Watch log.";
				}

			$add_to_db++; 
			}

		}

		$tmp_array = array('success'   =>$add_to_db,
						   'dublicate' =>$has_in_db);
		return $tmp_array;
	}
	/////////////////////////////////////////////////////////////////////

	// Функция принимает массив строк удаляет строки которые не являются
	// email-адресами.
	// Принимает массив строк
	// Возвращает массив строк

	function emails_filter(array $emails)  {

		foreach ($emails as $key => &$value) {
			if (filter_var($value,FILTER_VALIDATE_EMAIL)) {
				$emails[$key] = $value;
			} else {
				unset($emails[$key]);
			}
		}
		return $emails;
	}
	/////////////////


	// Функция получает массив где каждый элемент строка вида
	// емеил:пароль 
	// Функция возвращает массив где каждый элемент вида
	// емеил:пароль:логин:сервис
	function formated_sender(array $accounts,$separator){
		$final = array();

		foreach ($accounts as $key => $value) {
			$tmp_array = explode($separator,trim($value));

			if (filter_var($tmp_array[0],FILTER_VALIDATE_EMAIL)) {
				
				$login_and_service = explode('@', $tmp_array[0]);
				
				$final[] = array('email'    => $tmp_array[0],
								 'password' => $tmp_array[1],
								 'login'    => $login_and_service[0],
								 'service'  => $login_and_service[1]);

			} else {
				continue;
			}

		}

		return $final;
	}
	///////////////////////////////////////////

	// Добавляет аккаунты отправителей в базу данных
	// Принимает массив с данными об аккаунтах
	// Возвращает ассоциативный массив, по ключу 'success' содержит
	// количество добавленых адресов, по ключу 'dublicate' количество
	// дубликатов.

	function add_senders_to_db (array $senders) {
		global $pdo;
		$has_in_db = 0;  // количество дубликатов
		$add_to_db = 0;  // количество успешно добавленых аккаунтов

		foreach ($senders as $key => $value) {

			if (empty($value['password']) or empty($value['email']) ) {
				continue;
			}

			$email = $value['email'];

			$select_query = "SELECT * FROM senders WHERE  email = '$email'";

			$stm = $pdo->prepare($select_query);

			try {
				$stm->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

			if ($stm->rowCount() > 0) {
				$has_in_db++;
				continue;
			} else {
				 $array = array($value['email'],
								$value['password'],
								$value['login'],
								$value['service']);

				 $insert_query = "INSERT INTO senders(email,password,login,service) VALUES ('$array[0]','$array[1]','$array[2]','$array[3]')";

				 $sth = $pdo->prepare($insert_query);

				 try {
					$sth->execute();
				} catch (PDOException $e) {
					logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
					echo "MySql Error.Watch log.";
				}

				$add_to_db++;
			}
			
		}
		$counters = array('success'   => $add_to_db,
						  'dublicate' => $has_in_db);

		return $counters;
	}
	////////////////////////////////////////

?>