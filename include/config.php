<?php
	define('DB_HOST', 'localhost');  // DB host
	define('DB_USER', 'root');       // DB login
	define('DB_PASS', 'root');		 // DB password	
	define('DB_NAME', 'lazarsender'); // DB name
	define('SITE_ROOT', '/var/www/lazarsender/'); // site root looks like /username/var/public_html/

	define('DEBUG', true);

	define('LOG_PATH','tmp/');

	// Path to JSON file with settings
	define('SETTINGS_PATH', "json/settings.json"); 

	// Path to default JSON file with settings
	define('DEFAULT_SETTINGS_PATH', "json/default_settings.json"); 

	// Add  JSON object with settings to global visibility
	$GLOBALS['json_obj'] = json_decode(file_get_contents(SITE_ROOT.SETTINGS_PATH));

	// Limits the maximum execution time
	set_time_limit(9999999999);

	if (DEBUG) {
		error_reporting(E_ALL);
	} else {
		error_reporting(0);
	}

	require 'user_global_func.php';
?>