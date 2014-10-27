<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-22 21:18:58
         compiled from "./templates/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1774151806544590aed5caa0-86165885%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac655be6c67ed54268e373436809df028a40913f' => 
    array (
      0 => './templates/default/header.tpl',
      1 => 1414001270,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1774151806544590aed5caa0-86165885',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544590aed83f25_51264256',
  'variables' => 
  array (
    'javascript' => 0,
    'page_js' => 0,
    'page_style' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544590aed83f25_51264256')) {function content_544590aed83f25_51264256($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
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
 type="text/javascript" src="js/jMenu.jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"><?php echo '</script'; ?>
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

	<?php if (isset($_SESSION['user_id'])) {?>
		
		<?php echo '<script'; ?>
 type="text/javascript">
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
		<?php echo '</script'; ?>
>
		
	<?php }?>
	<link rel="stylesheet" type="text/css" href="templates/default/css/style.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-impromptu.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-min.css">
	<link rel="stylesheet" type="text/css" href="templates/default/css/jquery-ui.css" >
	<link rel="stylesheet" type="text/css" href="templates/default/css/jmenu.css" media="screen" />
	<?php if (isset($_smarty_tpl->tpl_vars['page_style']->value)) {?>
		<link rel="stylesheet" type="text/css" href="templates/default/css/<?php echo $_smarty_tpl->tpl_vars['page_style']->value;?>
">
	<?php }?>
	<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
	
</head>
<body>
<div class='header'><?php echo $_smarty_tpl->getConfigVariable('header_text');?>
</div>
<?php if (isset($_SESSION['user_id'])) {?>
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
<?php }?>	<?php }} ?>
