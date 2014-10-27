<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 02:25:43
         compiled from "./templates/default/404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1383339765544599f706fc53-41637261%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06349037ebc6b55e773bf1829962ad259977466e' => 
    array (
      0 => './templates/default/404.tpl',
      1 => 1413847510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1383339765544599f706fc53-41637261',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544599f7097a87_55767886',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544599f7097a87_55767886')) {function content_544599f7097a87_55767886($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"File Not Found.404"), 0);?>


	<div class="body">
			<div class="ui-widget">
                  <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
					<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
					<strong>Внимание!</strong> Error 404.File not found. Запрошеный вами файл не найден.</p>
				</div>
		</div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
