<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 02:54:06
         compiled from "./templates/default/emails.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114225506254459df2438232-84327688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9aa578adc28b9ebd55e07f9a29004b67cc6a6ed' => 
    array (
      0 => './templates/default/emails.tpl',
      1 => 1413849242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114225506254459df2438232-84327688',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54459df2494e46_62961055',
  'variables' => 
  array (
    'groups_array' => 0,
    'group' => 0,
    'group_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54459df2494e46_62961055')) {function content_54459df2494e46_62961055($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Получатели",'page_js'=>"emails.js"), 0);?>


	<div class='body'>
		<p>Добавьте новых пользователей для своих рассылок.</p>
		<p>На добавление каждых 100 пользователей уходит 10 секунд.Если пользователь уже есть в этой группе он не будет добавлен</p>
		<form class="pure-form pure-form-stacked" id="form" method="POST" action="javascript:void(null);"  onsubmit="add_emails()">
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
				</select>
				<label for="create_group">Добавьте в новую</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<label for="separator">Разделитель,если не нужно оставьте поле пустым</label>
				<input type="text" name="separator" autocomplete="off">
				<label for="emails"></label>
				<textarea required name="emails" cols="80" rows="20" placeholder="Введите адреса для добавления в базу данных"></textarea>
				<input  class="button-xsmall pure-button" type="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
