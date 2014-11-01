<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-impromptu.js"></script>
	<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
	<script type="text/javascript" src="js/ui.js"></script>

	{if isset($javascript)}
	<script type="text/javascript">
			{$javascript}
	</script>
	{/if}

	{if isset($page_js)}
		<script type="text/javascript" src="js/{$page_js}"></script>
	{/if}

	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-impromptu.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-min.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-skin-blue.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-ui.css" >
	<link rel="stylesheet" type="text/css" href="templates/default/css/side-menu.css"/>
	{if isset($page_style)}
		<link rel="stylesheet" type="text/css" href="templates/default/css/{$page_style}">
	{/if}
	<title>{$title}</title>
	<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body class="pure-skin-blue">

<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

<div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="home.php">Главная</a>

            <ul>
                <li class="menu-item-divided">
                    <a href="services.php">Сервисы</a>
                </li>
                
                <li class="menu-item-divided">
                    <a href="tools.php">Инструменты</a>
                </li>
            </ul>
            <ul>
               <li><a href="logs.php">Логи</a></li>
               <li><a href="settings.php">Настройки</a></li>
               <li><a href="logout.php">Выйти</a></li>
            </ul>
        </div>
         <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="groups.php">Emails</a>
                <ul>
                    <li><a href="emails.php">Добавить</a></li>
                    <li><a href="upload_emails.php">Загрузить</a></li>
                </ul>
         </div>
         <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="senders.php">Аккаунты</a>
                <ul>
                    <li><a href="add_senders.php">Добавить</a></li>
                </ul>
         </div>
         <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="campaings.php">Кампании</a>
                <ul>
                    <li class="menu-item-divided"><a href="add_campaing.php">Добавить</a></li>
                </ul>
         </div>
    </div>

