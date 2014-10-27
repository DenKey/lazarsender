<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 17:30:01
         compiled from "./templates/default/group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:75509085554464ba22f5ab6-10257817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0512fd1e4f08beb91f63e7e7d26de409913aca81' => 
    array (
      0 => './templates/default/group.tpl',
      1 => 1413901220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '75509085554464ba22f5ab6-10257817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54464ba2359138_12961364',
  'variables' => 
  array (
    'count' => 0,
    'group_emails' => 0,
    'row' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54464ba2359138_12961364')) {function content_54464ba2359138_12961364($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Просмотр группы",'page_js'=>"group.js"), 0);?>


		<div class="body">

		  <?php if ($_smarty_tpl->tpl_vars['count']->value==0) {?>
		  		<p align='center'>В группе еще нет адресов</p>
		  <?php } else { ?>
			<table class="pure-table">
				<thead>
		  			<tr>
				   		<td align="center">ID</td>
				   		<td align="center">Адрес</td>
				    	<td align="center">Добавлен</td>
				    	<td align="center"></td>				    			
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['group_emails']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>
					<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
</td><td align='center'><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['row']->value['created'];?>
</td><td><a href="#" onclick="delete_email(<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
)">
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
		
		<?php }?>

		</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
