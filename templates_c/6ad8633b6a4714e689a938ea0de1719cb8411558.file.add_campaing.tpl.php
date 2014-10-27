<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 18:36:19
         compiled from "./templates/default/add_campaing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1008068428544673bdf2a944-72561992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ad8633b6a4714e689a938ea0de1719cb8411558' => 
    array (
      0 => './templates/default/add_campaing.tpl',
      1 => 1413905765,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1008068428544673bdf2a944-72561992',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544673be12a375_88642478',
  'variables' => 
  array (
    'groups' => 0,
    'group' => 0,
    'group_name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544673be12a375_88642478')) {function content_544673be12a375_88642478($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Добавить кампанию",'page_js'=>"add_campaing.js"), 0);?>



<?php echo '<script'; ?>
 type="text/javascript" src="js/tinymce/tinymce.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript">
	tinymce.init({
				selector: "#editor",
		        plugins: [
		                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
		                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		                "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
		        ],

		        toolbar1: "fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
		        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

		        menubar: false,
		        toolbar_items_size: 'small',

		        style_formats: [
		                {title: 'Bold text', inline: 'b'},
		                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		                {title: 'Example 1', inline: 'span', classes: 'example1'},
		                {title: 'Example 2', inline: 'span', classes: 'example2'},
		                {title: 'Table styles'},
		                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		        ],

		        templates: [
		                {title: 'Test template 1', content: 'Test 1'},
		                {title: 'Test template 2', content: 'Test 2'}
		        ],
		        height: 300,
				cleanup: true,
				language: 'ru'
			});
<?php echo '</script'; ?>
>


<div class="body">
	<form class="pure-form pure-form-stacked" id="add_campaing" method="POST" action="javascript:void(null);" onsubmit="add()">
	  <fieldset>
		   <label for="name">Имя кампании
		   <input type="text" name="name" size="30" autocomplete="off" maxlength="35" required><br>
		   <label for="select">Выберите одну или более групп которым будут раcсылаться письма</label>
		   <select name="select[]" required multiple size="1">
		   		<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
						<?php $_smarty_tpl->tpl_vars["group_name"] = new Smarty_variable($_smarty_tpl->tpl_vars['group']->value['group_name'], null, 0);?>

						<?php if ('count_emails'==true) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"><?php echo ($_smarty_tpl->tpl_vars['group_name']->value).($_smarty_tpl->tpl_vars['group']->value['user_count_str']);?>
</option>
						<?php } else { ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['group']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['group_name']->value;?>
</option>
						<?php }?>
				<?php } ?>
		   </select>
		   <label for="subject">Тема письма
		   <input type="text" name="subject" size="100" autocomplete="off" maxlength="150" required><br>
		   <textarea name='html_str' id="editor"></textarea><br>
		   <input class="button-xsmall pure-button" type="submit" name="submit" value="Добавить">
	  </fieldset>
	</form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
