<?php
	require_once '../../include/auth.php';
	require_once '../../include/config.php';

    // получаем стандартные настройки из файла по умолчанию
    $default_settings = file_get_contents(SITE_ROOT.DEFAULT_SETTINGS_PATH);

	// записывает в файл настроек, информацию из файла по умолчанию
	file_put_contents(SITE_ROOT.SETTINGS_PATH,$default_settings);

	echo 'default';
?>