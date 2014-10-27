<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-22 23:28:31
         compiled from "./templates/default/services.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11355113354465b97aad568-63844573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64e99d671a7c1aaee1c1870230847afb7e90d1f9' => 
    array (
      0 => './templates/default/services.tpl',
      1 => 1414009663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11355113354465b97aad568-63844573',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54465b97b38e63_14108184',
  'variables' => 
  array (
    'services' => 0,
    'service' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54465b97b38e63_14108184')) {function content_54465b97b38e63_14108184($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Почтовые сервисы",'page_js'=>"services.js"), 0);?>


<div class="body">
	<a class="pure-button pure-button-active" href="#" onclick="add_service()">Добавить сервис</a></br></br>
	<table class="pure-table">
		<thead>
			<tr><td align='center'><b>Id</b></td>
			<td align='center'><b>Service</b></td>
			<td align='center'><b>Server</b></td>
			<td align='center'><b>Port</b></td>
			<td align='center'><b>Шифрование</b></td>
			<td align='center'><b>(Limit per day)</b></td>
			<td align='center'></td>
			<td align='center'></td></tr>
		</thead>
		<tbody>
	 	 <?php  $_smarty_tpl->tpl_vars['service'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['service']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['services']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['service']->key => $_smarty_tpl->tpl_vars['service']->value) {
$_smarty_tpl->tpl_vars['service']->_loop = true;
?>
	 	 	<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['service'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['server'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['port'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['crypt'];?>
</td>
			<td align="center"><?php echo $_smarty_tpl->tpl_vars['service']->value['daylimit'];?>
</td>
		 <td align="center"><a href="#" onclick="edit_service(<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
)"><img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
edit.png">
			<td align="center"><a href="#" onclick="delete_service(<?php echo $_smarty_tpl->tpl_vars['service']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['service']->value['service'];?>
')">
			<img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
delete.png" weight="17" height="17"></img></a></td></tr>
		<?php } ?>
		</tbody>
	</table>
	<br>
	<?php echo $_smarty_tpl->tpl_vars['get_result_text']->value;?>

	<br>
	<?php echo $_smarty_tpl->tpl_vars['get_prev_page_link']->value;?>

	<br>
	<?php if ($_smarty_tpl->tpl_vars['get_page_links']->value!="<span>1</span>") {?>
		<?php echo $_smarty_tpl->tpl_vars['get_page_links']->value;?>

	<?php }?>
</div>				

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
