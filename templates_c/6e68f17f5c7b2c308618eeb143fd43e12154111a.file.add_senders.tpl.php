<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 15:58:39
         compiled from "./templates/default/add_senders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13350042035446546a3224d5-41196257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e68f17f5c7b2c308618eeb143fd43e12154111a' => 
    array (
      0 => './templates/default/add_senders.tpl',
      1 => 1413895306,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13350042035446546a3224d5-41196257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446546a34eff7_58361352',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446546a34eff7_58361352')) {function content_5446546a34eff7_58361352($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Аккаунты",'page_js'=>"add_senders.js"), 0);?>


	<div class='body'>
		<p>Добавьте аккаунты для рассылки сообщений.На добавление каждых 100 аккаунтов уходит 10 секунд.Если аккаунт уже есть в базе он не будет добавлен.
		Аккаунты должны быть в формате email:password</p>
		<form class="pure-form pure-form-stacked" id="senders" method="POST" action="javascript:void(null);" onsubmit="add_senders()">
			<fieldset>
				<label for="acc_separator">Разделитель аккаунтов,если не нужно оставьте поле пустым</label>
				<input type="text" id="acc" name="acc_separator" autocomplete="off">
				<label for="auth_separator">Разделитель логинов от паролей</label>
				<input type="text" id="auth" name="auth_separator" autocomplete="off" required>
				<label for="accounts"></label>
				<textarea required name="accounts" cols="80" rows="20" placeholder="admin@gmail.com:qwerty" required></textarea></br>
				<input class="button-xsmall pure-button" type="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
