<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-22 16:40:27
         compiled from "./templates/default/senders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4353672165446535d84e220-35112421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b7c0340c8d43d30e0bcea945053f0fae211617a' => 
    array (
      0 => './templates/default/senders.tpl',
      1 => 1413985220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4353672165446535d84e220-35112421',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446535d884aa6_93587621',
  'variables' => 
  array (
    'senders' => 0,
    'sender' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446535d884aa6_93587621')) {function content_5446535d884aa6_93587621($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Просмотр аккаунтов",'page_js'=>"senders.js"), 0);?>


<div class="body">
	<table class="pure-table">
			<thead>
			 <tr align="center"><td><b>ID</b></td>
				<td align="center"><b>Email</b></td>
				<td align="center"><b>Password</b></td>
				<td align="center"><b>Login</b></td>
				<td align="center"><b>Service</b></td>
				<td align="center"><b>Last Use</b></td>
				<td></td>
				<td></td>
			 </tr>
			</thead>
			<tbody>
			<?php  $_smarty_tpl->tpl_vars['sender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['sender']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['senders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['sender']->key => $_smarty_tpl->tpl_vars['sender']->value) {
$_smarty_tpl->tpl_vars['sender']->_loop = true;
?>
				<tr><td><?php echo $_smarty_tpl->tpl_vars['sender']->value['id'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['sender']->value['email'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['sender']->value['password'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['sender']->value['login'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['sender']->value['service'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['sender']->value['lastsending'];?>
</td>
				<td><a href="#" onclick="edit_sender(<?php echo $_smarty_tpl->tpl_vars['sender']->value['id'];?>
)"><img src="templates/default/images/edit.png"></img></a></td>
				<td><a href="#" onclick="delete_sender(<?php echo $_smarty_tpl->tpl_vars['sender']->value['id'];?>
)">
				<img src='templates/default/images/delete.png' weight='17' height='17'></img></a></td></tr>
			<?php } ?>
			</tbody>
			</table><br>
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
