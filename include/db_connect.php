<?php
	require_once 'config.php';
	
	try {

	$pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS, array(
	    PDO::ATTR_PERSISTENT 		 => true,
	    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	));
	
	} catch (PDOException $e) {
		logging("Connect to DB failed:".$e->getMessage(),true,__FILE__,__LINE__);
		die('Connect to DataBase failed');
	}
?>