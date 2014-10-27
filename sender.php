<?php
	require_once 'include/auth.php';
	require_once 'include/config.php';
	require_once 'include/func_sender.php';
	require_once 'include/db_connect.php';


	require_once 'libs/Smarty.class.php';
	$smarty = new Smarty();
	require_once 'include/view_config.php';

	if (isset($_REQUEST['id'])) {
		$id = $_REQUEST['id'];
	} else {
		exit('campaing_not_selected');
	}

	$select_campaing = "SELECT * FROM campaings WHERE id=".$id;
	$campaing_id = $id;

	$stm = $pdo->prepare($select_campaing);

	try {
		$stm->execute();
	} catch (PDOException $e) {
		logging(implode(",",$stm->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}

	$campaing = $stm->fetch();

	$subject = $campaing['subject'];
	$letter  = $campaing['letter'];
	$emailscount = $campaing['emailscount'];
	$sentcount = $campaing['sentcount'];

	## Extract emails from DB to array $emails
	$groups = json_decode($campaing['groups']);

	if (empty($groups)) {
		exit('not selected group to sending');
	} else {
		$emails = emails_extractor($groups);
		$emails_num = count($emails);
		$emails = array_slice($emails, $sentcount); // удаляем адреса по которым уже разослали
	}
	#####

	### 
	$select_accounts = "SELECT * FROM senders";

	$sth = $pdo->prepare($select_accounts);
	
	try {
		$sth->execute();
	} catch (PDOException $e) {
		logging(implode(",",$sth->errorInfo()),true,__FILE__,__LINE__);
		echo "MySql Error.Watch log.";
	}
	#####
	
	$counter = 0;

	while ($account = $sth->fetch()){  // цикл первого уровня, аккаунты

			//// Проинициализиурем переменные для работы с аккаунтом
			$id 		   = $account['id']; 
			$service       = $account['service'];
			$account_email = $account['email'];
			$password      = $account['password'];
			$login         = $account['login'];
			$lastsending   = $account['lastsending'];
			$service_name  = $account['service'];
			///////////////

			// Если адресов нет то выходим из цикла
			if (empty($emails)) {
					break;
			}
			////////////////////

			// если сегодня отправлялись письма с этого аккаунта
			// то он будет пропущен
			if (date('Y-m-d') == $lastsending) {
				continue;
			}
			///////////////////////////////

			// делаем запрос на извлечение сервиса из БД согласно значению в аккаунте
			$select_service = sprintf("SELECT * FROM services WHERE service='%s'",
								$service_name);

			$stn = $pdo->prepare($select_service);

			try {
				$stn->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stn->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}

			$service = $stn->fetch();
			// на выходе получили массив $service в котором находятся
			// данные для работы аккаунта

			// если сервиса нет в базе будет совершена попытка присоедениться
			// по стандартным настройкам
			if ($service == false) {
				$server = "smtp.".$service_name;
				$port   = "465";
			} else {
				$server = $service['server'];
				$port = $service['port'];
			}
			////////////////////////////////////////

			//// Если лимит рассылки для сервиса не назначен
			// установим его как значение по умолчанию
			if (!empty($service['daylimit'])) {
				$daylimit = $service['daylimit'];
			} else {
				$daylimit  = 20;
			}
			///////////////////////////////////////

			// проинициазилизируем массив который передает данные соединения
			// функции рассылки
			$sender = array(
					'login'    => $login,
					'password' => $password,
					'email'    => $account_email,
					'host'	   => $server,
					'port'     => $port,
					'service'  => $service_name,
					'crypt'    => $service['crypt']
			);
			////////////////////////////

			for ($i=0; $i < $daylimit; $i++) { // цикл второго уровня рассылает согласно лимиту
				
				if (empty($emails)) {
					break;
				}

				$email = array_shift($emails);
				
				if (sender ($sender,$email,$subject,$letter) == 'error') {
					break;
				} else {
					$counter++;
				}
			}

			//// изменяем время последней рассылки для данного аккаунта
			$record_date = sprintf("UPDATE senders SET lastsending='%s'".
								   " WHERE id=%d",
								  	date('Y-m-d'),
									$id);

			$stp = $pdo->prepare($record_date);

			try {
				$stp->execute();
			} catch (PDOException $e) {
				logging(implode(",",$stp->errorInfo()),true,__FILE__,__LINE__);
				echo "MySql Error.Watch log.";
			}
			///
	}

	if ($emailscount == 0) {
		all_email_num_record($campaing_id,$emails_num);
	}
	
	$all_campaing_sent = sent_email_num_record($campaing_id,$counter);

	if ($all_campaing_sent == $emailscount) {
		$smarty->assign("full",true);

		$null_sql = sprintf("UPDATE campaings SET circulated=1,sentcount=0".
								   " WHERE id=%d",
									$campaing_id);

		$stb = $pdo->prepare($null_sql);
		$stb->execute();

	}

	$smarty->assign("counter",$counter);
	$smarty->assign("emails_num",$emails_num);
	$smarty->assign("all_campaing_sent",$all_campaing_sent);

	$smarty->display("sender.tpl");
?>