<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 23:39:47
         compiled from "./templates/default/show_error.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12160764415446c493787060-90060830%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '813732636db8add8cc3b2eac9db451f4fa97d925' => 
    array (
      0 => './templates/default/show_error.tpl',
      1 => 1413923964,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12160764415446c493787060-90060830',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'error_message' => 0,
    'system_error_message' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446c4937b6e93_89029997',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446c4937b6e93_89029997')) {function content_5446c4937b6e93_89029997($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Ошибка"), 0);?>


<div class="body">
	<div class="ui-widget">
		<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Ошибка:</strong><?php echo $_smarty_tpl->tpl_vars['error_message']->value;?>
<br><?php echo $_smarty_tpl->tpl_vars['system_error_message']->value;?>
</p>
		</div>
	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
