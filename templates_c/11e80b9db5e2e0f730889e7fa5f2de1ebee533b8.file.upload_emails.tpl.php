<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 04:38:32
         compiled from "./templates/default/upload_emails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18901251465445a448d62727-29529991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11e80b9db5e2e0f730889e7fa5f2de1ebee533b8' => 
    array (
      0 => './templates/default/upload_emails.tpl',
      1 => 1413855504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18901251465445a448d62727-29529991',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5445a448dcb7e2_97823054',
  'variables' => 
  array (
    'success_str' => 0,
    'groups_array' => 0,
    'group' => 0,
    'group_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5445a448dcb7e2_97823054')) {function content_5445a448dcb7e2_97823054($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Загрузка из файла"), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("success", null, null); ob_start(); ?>
	<?php echo '<script'; ?>
 type="text/javascript">
				var n = noty({
		            text    : "<?php echo $_smarty_tpl->tpl_vars['success_str']->value;?>
",
		            type    : 'success',
		            layout  : 'topCenter',
	       		 });
			<?php echo '</script'; ?>
>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if (isset($_smarty_tpl->tpl_vars['success_str']->value)) {?>
	<?php echo Smarty::$_smarty_vars['capture']['success'];?>

<?php }?>

	<div class="body">
		<h2>Добавьте адреса из файла</h2>
		<p>Адреса должны быть размещены в файле построчно,без посторонних символов</p>
		<form class="pure-form pure-form-stacked" action="/upload.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<label for="select_group">Выберите группу пользователей</label>
				<select name="select_group">
					<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
						<?php $_smarty_tpl->tpl_vars["group_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['group']->value['group_name'], null, 0);?>

						<?php if ('count_emails'==true) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"><?php echo ($_smarty_tpl->tpl_vars['group_name']->value).($_smarty_tpl->tpl_vars['group']->value['user_count_str']);?>
</option>
						<?php } else { ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['group_name']->value;?>
</option>
						<?php }?>
					<?php } ?>
				</select></br>
				<label for="create_group">Добавьте в новую</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<label for="separator">Разделитель,если не нужно оставьте поле пустым</label>
				<input type="text" name="separator" autocomplete="off"><br>
				<label for="file"></label>
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000000" />
				<input type="file" accept="text/plain" name="filename">
				<input class="button-xsmall pure-button" type="submit" name="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
