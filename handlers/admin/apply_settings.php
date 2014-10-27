<?php
	require_once '../../include/auth.php';
	require_once '../../include/config.php';

	// Найдем все полученные данные из запроса
	// и перезапишем в объект 'json_obj' если указанные ключи были в нем изначально  
	foreach ($_REQUEST as $key => $value) {
		
		$array = get_object_vars($GLOBALS['json_obj']);

		if (isset($_REQUEST[$key])) {

			if (array_key_exists($key,$array)) {
				$GLOBALS['json_obj']->$key = $value;
			}
			
		}

	}
	// Записывает содержимое глобального объекта 'json_obj'
	// в файл настроек указанный в SETTINGS_PATH
	// Если SETTINGS_PATH не существует, файл будет создан

	file_put_contents(SITE_ROOT.SETTINGS_PATH,json_encode($GLOBALS['json_obj']));

	//$str = 'name';
	//echo $_GLOBALS['json_obj']->$str
?>