<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-26 23:11:16
         compiled from "templates/default/campaings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:209999161854467004e23664-59728126%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '841b6849fa8a89bc079f92ddaa83aadda965f864' => 
    array (
      0 => 'templates/default/campaings.tpl',
      1 => 1414357875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209999161854467004e23664-59728126',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54467004e7c3c3_45310966',
  'variables' => 
  array (
    'campaings' => 0,
    'campaing' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54467004e7c3c3_45310966')) {function content_54467004e7c3c3_45310966($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Кампании",'page_js'=>"campaings.js"), 0);?>


<div class="body">
	<table class="pure-table">
		<thead>
			<tr><td align='center'><b>ID</b></td>
			<td align='center'><b>Имя кампании</b></td>
			<td align='center'><b>Группы рассылки</b></td>
			<td align='center'><b>Тема письма</b></td>
			<td align='center'>Отправлено</td>
			<td align='center'></td>
			<td align='center'></td>
		</thead>
		<tbody>
		 <?php  $_smarty_tpl->tpl_vars['campaing'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['campaing']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['campaings']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['campaing']->key => $_smarty_tpl->tpl_vars['campaing']->value) {
$_smarty_tpl->tpl_vars['campaing']->_loop = true;
?>
		 	<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
</td>
			<td align="center"><a href="edit_campaing.php?id=<?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['campaing']->value['name'];?>
</a></td>
			<td align="left"><?php echo $_smarty_tpl->tpl_vars['campaing']->value['group_select_str'];?>
</td>
			<td align="center"><textarea cols="40" rows="3" readonly><?php echo $_smarty_tpl->tpl_vars['campaing']->value['subject'];?>
</textarea></td>
			<td align="center"><?php if ($_smarty_tpl->tpl_vars['campaing']->value['emails_count']==0) {?>непосчитано<?php } else {
echo $_smarty_tpl->tpl_vars['campaing']->value['sent_count'];?>
 из <?php echo $_smarty_tpl->tpl_vars['campaing']->value['emails_count'];?>
 <?php }?><br><?php if ($_smarty_tpl->tpl_vars['campaing']->value['circulated']==1) {?>Уже отправлена<?php }?></td>
			<td align="center"><a href="edit_campaing.php?id=<?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
" title="Редактировать"><img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
email_edit.png"></img></a>
			<a href="#" title="Удалить" onclick="delete_campaing(<?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['campaing']->value['name'];?>
')">
			<img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
email_delete.png"</img></a>
			<a href="#" onclick="test_send(<?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['campaing']->value['test_email'];?>
')" title="Отправить на проверку"><img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
email_test.png"> </img></a></td>
            <td><a href="sender.php?id=<?php echo $_smarty_tpl->tpl_vars['campaing']->value['id'];?>
" title="Разослать"><img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
email_send.png">
			</img></a></td></tr>
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
