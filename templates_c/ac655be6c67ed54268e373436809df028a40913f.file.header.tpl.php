<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-01 20:16:47
         compiled from "templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17110259305455238fe09af5-42192350%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac655be6c67ed54268e373436809df028a40913f' => 
    array (
      0 => 'templates/default/header.tpl',
      1 => 1414854651,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17110259305455238fe09af5-42192350',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'javascript' => 0,
    'page_js' => 0,
    'page_style' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5455238fe2f338_69283870',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5455238fe2f338_69283870')) {function content_5455238fe2f338_69283870($_smarty_tpl) {?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-ui.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-impromptu.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/ui.js"><?php echo '</script'; ?>
>

	<?php if (isset($_smarty_tpl->tpl_vars['javascript']->value)) {?>
	<?php echo '<script'; ?>
 type="text/javascript">
			<?php echo $_smarty_tpl->tpl_vars['javascript']->value;?>

	<?php echo '</script'; ?>
>
	<?php }?>

	<?php if (isset($_smarty_tpl->tpl_vars['page_js']->value)) {?>
		<?php echo '<script'; ?>
 type="text/javascript" src="js/<?php echo $_smarty_tpl->tpl_vars['page_js']->value;?>
"><?php echo '</script'; ?>
>
	<?php }?>

	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-impromptu.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-min.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-skin-blue.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-ui.css" >
	<link rel="stylesheet" type="text/css" href="templates/default/css/side-menu.css"/>
	<?php if (isset($_smarty_tpl->tpl_vars['page_style']->value)) {?>
		<link rel="stylesheet" type="text/css" href="templates/default/css/<?php echo $_smarty_tpl->tpl_vars['page_style']->value;?>
">
	<?php }?>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	<!--[if lt IE 9]><?php echo '<script'; ?>
 src="http://html5shim.googlecode.com/svn/trunk/html5.js"><?php echo '</script'; ?>
><![endif]-->
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

<?php }} ?>
