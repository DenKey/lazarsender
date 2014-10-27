<?php
	require_once 'config.php';
  require_once 'db_connect.php';
	require_once SITE_ROOT.'phpmailer/extras/class.html2text.php';
	require_once SITE_ROOT.'phpmailer/class.phpmailer.php';
	require_once SITE_ROOT.'phpmailer/class.smtp.php';

	function sender (array $sender,$email,$subject,$message){
    date_default_timezone_set('Etc/UTC');

    // convert html page to text-plain
    $html2text = new Html2Text($message);
	  $alt_message = $html2text->get_text();
	  ////////

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
// Set charset
$mail->CharSet = 'UTF-8';
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

$mail->Host = $sender['host'];
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port =  intval($sender['port']);

if ($sender['crypt'] != "ssl") {
  $mail->SMTPSecure = $sender['crypt'];     
}

//Whether to use SMTP authentication
$mail->SMTPAuth = true;


//Username to use for SMTP authentication
$mail->Username = $sender['email'];
//Password to use for SMTP authentication
$mail->Password = $sender['password'];

//Set who the message is to be sent from
$mail->setFrom($sender['email'], $sender['login']);
//Set an alternative reply-to address
$mail->addReplyTo($sender['email'], $sender['login']);
//Set who the message is to be sent to
$mail->addAddress($email);

$mail->Subject = $subject;
   	
$mail->msgHTML($message);
$mail->AltBody = $alt_message;
    
if(!$mail->send()){
      // запись в лог
      logging($mail->ErrorInfo,false,__FILE__,__LINE__);
    	return 'error';
  }else {
    	return 'sent';
}  
    
} 

  

  
    //// Запись количества всех емейлов кампании 
  function all_email_num_record($campaing_id,$emails_num){
      global $pdo;
      $insert_camp_em = sprintf("UPDATE campaings SET emailscount='%d'".
                   " WHERE id=%d",
                    $emails_num,
                    $campaing_id);

      $sto = $pdo->prepare($insert_camp_em);

      try {
        $sto->execute();
      } catch (PDOException $e) {
        logging(implode(",",$sto->errorInfo()),true,__FILE__,__LINE__);
        echo "MySql Error.Watch log.";
      }
  }    
  ////////////////////////////////////////////////////////////////////////

  

  
    //// Запись количества уже отправленных писем //////////////////////////////
  function sent_email_num_record($campaing_id,$counter){
      global $pdo;
      $select_sent_count = sprintf("SELECT sentcount FROM campaings ".
                                   " WHERE id=%d",
                                   $campaing_id);

      $stz = $pdo->prepare($select_sent_count);

      try {
        $stz->execute();
      } catch (PDOException $e) {
        logging(implode(",",$stz->errorInfo()),true,__FILE__,__LINE__);
        echo "MySql Error.Watch log.";
      }

      $old_counter =  $stz->fetchColumn();

      $insert_sent_count = sprintf("UPDATE campaings SET sentcount='%d'".
                                   " WHERE id=%d",
                                   $counter,
                                   $campaing_id);

      $stz = $pdo->prepare($insert_sent_count);

      try {
        $stz->execute();
      } catch (PDOException $e) {
        logging(implode(",",$stz->errorInfo()),true,__FILE__,__LINE__);
        echo "MySql Error.Watch log.";
      }

      return $old_counter+$counter;
  } 
  ////////////////////////////////////////////////////////////////////////

   // Функция извлекает из БД адреса согласно группам, объдиняет группы в одну временную
   // очищая от дубликатов
   // Принимает строковый массив с идентификаторами гурпп пользователей
   // Возвращает строковый массив с адресами.
  function emails_extractor(array $groups){

    $emails = array();

    foreach ($groups as $group) {
      global $pdo;

      $group_emails_array = array();

      $select_query = sprintf("SELECT email FROM recepients WHERE mail_group=%d",
                  intval($group));
      
      $stl = $pdo->prepare($select_query);

      try {
        $stl->execute();
      } catch (PDOException $e) {
        logging(implode(",",$stl->errorInfo()),true,__FILE__,__LINE__);
        echo "MySql Error.Watch log.";
      }

      while ($email = $stl->fetch()) {
        $group_emails_array[] = $email['email'];
      }

      $emails = array_merge($emails,$group_emails_array);
    }

    $emails = array_unique($emails);

    return $emails;
  }
  ///////////
?>