<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-11-01 00:21:36
         compiled from "templates/default/edit_campaing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1695105760544676cb8b87e7-32753381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24f9984cd1a2554e05d75d3f466bcf2562fdf1a4' => 
    array (
      0 => 'templates/default/edit_campaing.tpl',
      1 => 1414793974,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1695105760544676cb8b87e7-32753381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544676cb927256_56066930',
  'variables' => 
  array (
    'group_select_str' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544676cb927256_56066930')) {function content_544676cb927256_56066930($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Редактировать кампанию"), 0);?>



	<?php echo '<script'; ?>
 type="text/javascript" src="js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="js/edit_campaing.js"><?php echo '</script'; ?>
>



<div class="body">
	<form class="pure-form pure-form-stacked" id="edit_campaing" method="POST" action="javascript:void(null);" onsubmit="edit_campaing()">
		<fieldset>
			<label for="name">Имя кампании
			<input type="text" name="name" size="30" autocomplete="off" maxlength="20" required><br>
			<label for="">Группы адресов которым будет произведена рассылка.Если вы хотите сделать рассылку по другим группам, создайте новую кампанию.</label>
			<?php echo $_smarty_tpl->tpl_vars['group_select_str']->value;?>

			<label for="subject">Тема письма
			<input type="text" name="subject" size="100" autocomplete="off" maxlength="150" required><br>
			<textarea name="html_str" id="editor"></textarea><br>
			<input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить">
		</fieldset>
	</form>
</div>	   

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
