<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-23 21:35:39
         compiled from "./templates/default/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8324476205446ab3cb477a2-54780436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6a3392241e264f4ddde9f98b66305d56db57bddc' => 
    array (
      0 => './templates/default/settings.tpl',
      1 => 1414089336,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8324476205446ab3cb477a2-54780436',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5446ab3cbd3af5_72551676',
  'variables' => 
  array (
    'count_emails' => 0,
    'accounts_number' => 0,
    'groups_number' => 0,
    'emails_number' => 0,
    'service_number' => 0,
    'campaings_number' => 0,
    'test_email' => 0,
    'admins' => 0,
    'admin' => 0,
    'get_result_text' => 0,
    'get_prev_page_link' => 0,
    'get_page_links' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5446ab3cbd3af5_72551676')) {function content_5446ab3cbd3af5_72551676($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Настройки",'page_js'=>"settings.js"), 0);?>




<div class="body" id="tabs">
    <ul>
      <li><a href="#tabs-1">Интерфейс</a></li>
      <li><a href="#tabs-2">Отладка рассылок</a></li>
      
         <?php if ($_SESSION['group']) {?>
            <li><a href="#profile">Профиль</a></li>
         <?php } else { ?>
            <li><a href="#users">Пользователи</a></li>
         <?php }?>	
    </ul>
  <div id="tabs-1">
   <form class="pure-form" id="formx" method="POST" action="javascript:void(null);" onsubmit="save_settings()">
         <fieldset>
          <p><b>Отображать количество адресов рядом с названием групп:</b><br>
          <div id="radio">
             <input type="radio" id="radio1" name="count_emails" <?php if ($_smarty_tpl->tpl_vars['count_emails']->value) {?> checked <?php }?> value="1"><label for="radio1">Отображать</label>
             <input type="radio" id="radio2" name="count_emails" <?php if (!$_smarty_tpl->tpl_vars['count_emails']->value) {?> checked <?php }?> value="0"><label for="radio2">Нет</label>
             </div><br>
               <p><b>Количество отображаемых аккаунтов на странице:</b><br>
               <input type="number" min="5" name="accounts_number" value="<?php echo $_smarty_tpl->tpl_vars['accounts_number']->value;?>
"><br>
               <br>
               <p><b>Количество отображаемых групп на странице:</b><br>
               <input type="number" min="5" name="groups_number" value="<?php echo $_smarty_tpl->tpl_vars['groups_number']->value;?>
"><br>
               <br>
               <p><b>Количество адресов отображаемых на странице при просмотре группы:</b><br>
               <input type="number" min="5" name="emails_number" value="<?php echo $_smarty_tpl->tpl_vars['emails_number']->value;?>
"><br>
               <br>
                <p><b>Количество сервисов отображаемых на странице:</b><br>
               <input type="number" min="5" name="service_number" value="<?php echo $_smarty_tpl->tpl_vars['service_number']->value;?>
"><br>
               <br>
               <p><b>Количество кампаний отображаемых на странице:</b><br>
             <input type="number" min="5" name="campaings_number" value="<?php echo $_smarty_tpl->tpl_vars['campaings_number']->value;?>
"><br>
               <br>
             <input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить">
 			<input class="button-xsmall pure-button" type="button" name="default" value="По Умолчанию" onclick="reset_to_default()">
         </fieldset>
      </form>
    </div>

    <div id="tabs-2">
      <form class="pure-form" id="formx2" method="POST" action="javascript:void(null);" onsubmit="save_settings_tab2()">
         <fieldset>
               <p><b>Адрес на который будут отправлятся тестовые письма:</b><br>
               <input type="text" name="test_email" value="<?php echo $_smarty_tpl->tpl_vars['test_email']->value;?>
"><br>
               <br>
               <input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить">
               <input class="button-xsmall pure-button" type="button" name="default" value="По Умолчанию" onclick="reset_to_default()">
         </fieldset>
      </form>
   </div>

    <?php if ($_SESSION['group']) {?>
            <div id="profile">
               <input class="button-small pure-button" type='button' name='edit_profile' value='Редактировать данные' onclick="edit_user('<?php echo $_SESSION['login'];?>
',<?php echo $_SESSION['user_id'];?>
)">
            </div>
    <?php } else { ?>
        <div id="users">
			<input class="button-xsmall pure-button" type="button" name="add_user" value="Добавить" onclick="add_user()">
			 <br><br>
			 <table class="pure-table">
			     <thead>
			       <tr>
			           <td>id</td>
			           <td>Логин</td>
			           <td>Email</td>
			           <td>Группа</td>
			           <td></td>
			           <td></td>
			        </tr>  
			     </thead>
			      <tbody>
			      <?php  $_smarty_tpl->tpl_vars['admin'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['admin']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['admins']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['admin']->key => $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->_loop = true;
?>
			      	<tr><td><?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['login'];?>
</td>
                    <td>******</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['email'];?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['admin']->value['group'];?>
</td>                      
                    <td><a href="#" onclick="edit_user('<?php echo $_smarty_tpl->tpl_vars['admin']->value['login'];?>
',<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
)"><img src="<?php echo $_smarty_tpl->getConfigVariable('img_path');?>
edit.png"></img></a> 
                    <a href='#' onclick="delete_user('<?php echo $_smarty_tpl->tpl_vars['admin']->value['login'];?>
',<?php echo $_smarty_tpl->tpl_vars['admin']->value['id'];?>
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
		</div>
    <?php }?>


</div>               
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
