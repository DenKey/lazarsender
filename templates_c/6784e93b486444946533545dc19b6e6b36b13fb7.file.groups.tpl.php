<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 14:48:35
         compiled from "./templates/default/groups.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1329031773544641f5969190-15335944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6784e93b486444946533545dc19b6e6b36b13fb7' => 
    array (
      0 => './templates/default/groups.tpl',
      1 => 1413892112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1329031773544641f5969190-15335944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544641f5bfdfe0_00581831',
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544641f5bfdfe0_00581831')) {function content_544641f5bfdfe0_00581831($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Управление группами адресов",'page_js'=>"groups.js",'page_style'=>"groups.css"), 0);?>



	<div class="body">
		<div>
			<form class="pure-form" method="POST" id="formx" action="javascript:void(null);" onsubmit="add_group()">
				<label for="create_group">Добавить новую группу</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<input class="button-xsmall pure-button" type="submit" value="Добавить" name="submit">
			</form>
		</div>
		<h3>Все группы адресов</h3>
		<table class="pure-table">
		<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
			<tr><td><a href="group.php?group_id=<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];
echo $_smarty_tpl->tpl_vars['group']->value['user_count'];?>
</a></td><td><a href='#' onclick="edit_group('<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
)"><img src="templates/default/images/edit.png"></img></a></td><td><a href='#' onclick="delete_group('<?php echo $_smarty_tpl->tpl_vars['group']->value['group_name'];?>
',<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
)">
			<img src="templates/default/images/delete.png" weight="17" height="17"></img></a></td></tr>

		<?php }
if (!$_smarty_tpl->tpl_vars['group']->_loop) {
?>
			<p>Нет добавленных групп</p>
		<?php } ?>
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
