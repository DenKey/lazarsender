<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 23:32:19
         compiled from "./templates/default/logs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9721864415446c2d32377a2-37692604%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6bc4f20904c938b0b2700556592b633cc743ec9' => 
    array (
      0 => './templates/default/logs.tpl',
      1 => 1413923531,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9721864415446c2d32377a2-37692604',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mail_log' => 0,
    'site_log' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446c2d32a0534_93456031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446c2d32a0534_93456031')) {function content_5446c2d32a0534_93456031($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Логи",'page_js'=>"logs.js"), 0);?>


	<div class=body id="tabs">
		<ul>
			<li><a href="#tabs-1">Почтовые логи</a></li>
			<li><a href="#tabs-2">Логи сайта</a></li>
		</ul>

		<div id="tabs-1">
		  <textarea cols="100%" rows="15" placeholder="empty"><?php if (isset($_smarty_tpl->tpl_vars['mail_log']->value)) {
echo $_smarty_tpl->tpl_vars['mail_log']->value;
}?></textarea>
		    <input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(0);">
		</div>

		<div id="tabs-2">
		<textarea cols="100%" rows="15" placeholder="empty"><?php if (isset($_smarty_tpl->tpl_vars['site_log']->value)) {
echo $_smarty_tpl->tpl_vars['site_log']->value;
}?></textarea>
		<input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(1);">
		</div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
