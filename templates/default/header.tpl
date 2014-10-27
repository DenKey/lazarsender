<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="js/jquery-impromptu.js"></script>
	<script type="text/javascript" src="js/jMenu.jquery.min.js"></script>
	<script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>

	{if isset($javascript)}
	<script type="text/javascript">
			{$javascript}
	</script>
	{/if}

	{if isset($page_js)}
		<script type="text/javascript" src="js/{$page_js}"></script>
	{/if}

	{if isset($smarty.session.user_id)}
		{literal}
		<script type="text/javascript">
			$(document).ready(function(){
			    // simple jMenu plugin called
			    $(".jMenu").jMenu();
			 
			    // more complex jMenu plugin called
			    $("#jMenu").jMenu({
				      ulWidth : 'auto',
				      effects : {
				      effectSpeedOpen : 300,
				      effectTypeClose : 'slide'
				      },
				      animatedText : false
    			});
	 	});
		</script>
		{/literal}
	{/if}
	<link rel="stylesheet" type="text/css" href="templates/default/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-impromptu.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-min.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-ui.css" >
	<link rel="stylesheet" type="text/css" href="templates/default/css/jmenu.css" media="screen" />
	{if isset($page_style)}
		<link rel="stylesheet" type="text/css" href="templates/default/css/{$page_style}">
	{/if}
	<title>{$title}</title>
	
</head>
<body>
<div class='header'>{#header_text#}</div>
{if isset($smarty.session.user_id)}
<div class="menu">
		<ul class="jMenu">
			  <li><a href="home.php">Главная</a></li>
			  <li><a href="groups.php">Emails</a>
			  	<ul>
			  		<li><a href="emails.php">Добавить</a></li>
			  		<li><a href="upload_emails.php">Загрузить</a></li>
			  	</ul>
			  </li>
			  <li><a href="senders.php">Аккаунты</a>
			    <ul>
			      <li><a href="add_senders.php">Добавить</a></li>
			    </ul>
			  </li>
			  <li><a href="services.php">Сервисы</a></li>
			  <li><a href="campaings.php">Кампании</a>
			    <ul>
			      <li><a href="add_campaing.php">Добавить кампанию</a></li>
			    </ul>
			  </li>
			  <li><a href="settings.php">Настройки</a></li>
			  <li><a href="logs.php">Логи</a></li>
			  <li><a href="tools.php">Инструменты</a></li>
			  <li><a href="logout.php">Выйти</a></li>
		</ul>
</div>
{/if}	