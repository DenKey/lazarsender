<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-23 20:53:18
         compiled from "./templates/default/tools.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8588366145446c35244da69-72599598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d5f767e714a78d7b016aa66e691b8d1399d06ad' => 
    array (
      0 => './templates/default/tools.tpl',
      1 => 1414086793,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8588366145446c35244da69-72599598',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446c352467000_55138525',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446c352467000_55138525')) {function content_5446c352467000_55138525($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Инструменты"), 0);?>


<div class="body">
		<ul>
			<li><a class="pure-button" href="smtp_test.php">Проверка настроек SMTP</a></li>
		</ul>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
