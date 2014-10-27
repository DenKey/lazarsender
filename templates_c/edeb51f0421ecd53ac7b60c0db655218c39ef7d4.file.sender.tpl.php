<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-26 22:32:22
         compiled from "templates/default/sender.tpl" */ ?>
<?php /*%%SmartyHeaderCode:87115926544800c262ce39-08720505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'edeb51f0421ecd53ac7b60c0db655218c39ef7d4' => 
    array (
      0 => 'templates/default/sender.tpl',
      1 => 1414355128,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '87115926544800c262ce39-08720505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544800c2656bf2_09050187',
  'variables' => 
  array (
    'full' => 0,
    'counter' => 0,
    'emails_num' => 0,
    'all_campaing_sent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544800c2656bf2_09050187')) {function content_544800c2656bf2_09050187($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Кампания разослана"), 0);?>


<div class="body">
	<?php if (isset($_smarty_tpl->tpl_vars['full']->value)) {?>
		<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
			<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
			<strong>Внимание !</strong> Кампания была успешно разослана по всем адресам</p>
			</div>
		</div>
	<?php }?>
	<p>За сеанс отправлено <?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
 из <?php echo $_smarty_tpl->tpl_vars['emails_num']->value;?>
</p>
	<p>Всего за кампанию оправлено <?php echo $_smarty_tpl->tpl_vars['all_campaing_sent']->value;?>
 писем</p>
	<p>Проверьте дневные лимиты на всех ваших аккаунтах</p>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
