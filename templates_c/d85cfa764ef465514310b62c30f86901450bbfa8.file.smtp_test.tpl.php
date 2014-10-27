<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-23 20:42:23
         compiled from "./templates/default/smtp_test.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19912843225449312c488382-25323430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd85cfa764ef465514310b62c30f86901450bbfa8' => 
    array (
      0 => './templates/default/smtp_test.tpl',
      1 => 1414086141,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19912843225449312c488382-25323430',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5449312c4af181_06427566',
  'variables' => 
  array (
    'test_email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5449312c4af181_06427566')) {function content_5449312c4af181_06427566($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Проверка SMTP",'page_js'=>"smtp_test.js"), 0);?>


<div class="body pure-g">
	<div class="pure-u-1-3">
		<form class="pure-form pure-form-stacked" id="test_smtp" method="POST" action="javascript:void(null);" onsubmit="test()">
	  <fieldset>
		   <label for="host">Адрес сервера
		   <input type="text" name="host" size="30" required><br>
		   <label for="port">Порт
		   <input type="number" min='1' name="port" size="30" required><br>
		   <label for="username">Логин
		   <input type="text" name="username" size="30" required><br>
		   <label for="password">Пароль
		   <input type="text" name="password" size="30"required><br>
		   <label for="crypt">Тип шифрования(например tls или ssl)
		   <input type="text" name="crypt" size="30" required><br>
		   <label for="email">Адрес получателя
		   <input type="text" name="email" size="30" required value="<?php echo $_smarty_tpl->tpl_vars['test_email']->value;?>
"><br>
		   
		   <input class="button-xsmall pure-button" type="submit" name="submit" value="Отправить">
	  </fieldset>
	</form>
	</div>
    <div class="pure-u-1-2">
    <form class="pure-form pure-form-stacked">
    	<fieldset>
    		<label for="view">После отправки сообщения здесь появится отчет
		    <textarea name='view' cols='50%' rows="25" placeholder="response from the server"></textarea><br>
    	</fieldset>
    </form>
    </div>
	
</div>
<div class="modal"></div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
