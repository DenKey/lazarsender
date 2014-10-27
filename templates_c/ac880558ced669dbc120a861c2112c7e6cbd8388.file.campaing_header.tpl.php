<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 19:02:58
         compiled from "./templates/default/campaing_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:988849679544677334d62a8-49407871%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac880558ced669dbc120a861c2112c7e6cbd8388' => 
    array (
      0 => './templates/default/campaing_header.tpl',
      1 => 1413907377,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '988849679544677334d62a8-49407871',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54467733523510_34070727',
  'variables' => 
  array (
    'javascript' => 0,
    'page_js' => 0,
    'page_style' => 0,
    'title' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54467733523510_34070727')) {function content_54467733523510_34070727($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
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
			    $(".jMenu").jMenu({
					  openClick : false,
					  ulWidth : 'auto',
					  effects : {
						effectSpeedOpen : 200,
						effectSpeedClose : 200,
						effectTypeOpen : 'slide',
						effectTypeClose : 'slide',
						effectOpen : 'linear',
						effectClose : 'linear'
					  },
					  TimeBeforeOpening : 100,
					  TimeBeforeClosing : 100,
					  animatedText : true,
					  paddingLeft: 1
				});

				tinyMCE.init({
					selector: "#editor",
			   		theme : "modern"
				});

			    var ed = tinymce.get("editor");

		        //ed.setContent('adsd');
		        console.log(ed);
		var campaing_id = getVar('id');
		ajaxLoad();

			function ajaxLoad() {


		       $.ajax({
					type: "POST",
					url: "handlers/campaings/select_campaing.php",
					data: {
						id: campaing_id
					},
					error: function(xhr, str) {
						alert('Возникла ошибка: ' + xhr.responseCode);
					}
				}).done(function(result) {

					if (result == 'notfill') {
						$.prompt("Выбранная кампания не найдена.Вы будете возвращены к списку кампаний", {
							title: "Неверный ID кампании",
							buttons: {
								"Вернуться к списку": true
							},
							submit: function(e, v, m, f) {
								if (v) {
									window.location = "campaings.php";
								}
							}
						});
					} else {
						var obj_from_json = JSON.parse(result);

						var str = obj_from_json.html_str.toString();

						var groups = JSON.parse(obj_from_json.groups);

						// выделим все группы из БД
						for (var i=0;i<groups.length;i++) {
							$('#select option[value=' +groups[i]+ ']').attr('selected', 'selected');
						};

						$("[name|='name']").val(obj_from_json.name);
						$("[name|='subject']").val(obj_from_json.subject);

					}
					});
				}
// Thanks http://scripts.franciscocharrua.com/javascript-get-variables.php
function getVar(name)
         {
         get_string = document.location.search;         
         return_value = '';
         
         do { //This loop is made to catch all instances of any get variable.
            name_index = get_string.indexOf(name + '=');
            
            if(name_index != -1)
              {
              get_string = get_string.substr(name_index + name.length + 1, get_string.length - name_index);
              
              end_of_value = get_string.indexOf('&');
              if(end_of_value != -1)                
                value = get_string.substr(0, end_of_value);                
              else                
                value = get_string;                
                
              if(return_value == '' || value == '')
                 return_value += value;
              else
                 return_value += ', ' + value;
              }
            } while(name_index != -1)
            
         //Restores all the blank spaces.
         space = return_value.indexOf('+');
         while(space != -1)
              { 
              return_value = return_value.substr(0, space) + ' ' + 
              return_value.substr(space + 1, return_value.length);
							 
              space = return_value.indexOf('+');
              }
          
         return(return_value);        
         }
///////////
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
			  <li><a>Emails  </a>
			  	<ul>
			  		<li><a href="emails.php">Добавить</a></li>
			  		<li><a href="upload_emails.php">Загрузить</a></li>
			  		<li><a href="groups.php">Группы</a></li>
			  	</ul>
			  </li>
			  <li><a>Аккаунты</a>
			    <ul>
			      <li><a href="add_senders.php">Добавить</a></li>
			      <li><a href="senders.php">Управление</a></li>
			    </ul>
			  </li>
			  <li><a href="services.php">Сервисы</a></li>
			  <li><a>Кампании</a>
			    <ul>
			      <li><a href="campaings.php">Управление</a></li>
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
