<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-21 04:24:25
         compiled from "./templates/default/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:77686664544590aecdc070-48019434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1f7b307f8d7ea959717beb702aa6b178e2bf9ea' => 
    array (
      0 => './templates/default/index.tpl',
      1 => 1413854659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '77686664544590aecdc070-48019434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544590aed180b5_77866882',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544590aed180b5_77866882')) {function content_544590aed180b5_77866882($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Главная",'page_js'=>"index.js"), 0);?>


<?php $_smarty_tpl->_capture_stack[0][] = array("error", null, null); ob_start(); ?>
    
        <?php echo '<script'; ?>
 type="text/javascript">
            var n = noty({
                text        : "$smarty.get.error_message",
                type        : 'error',
                layout      : 'topCenter',
             });
        <?php echo '</script'; ?>
>
    
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>



<div class="body">
        <center>
            <form class="pure-form pure-form-stacked" id="login" method="POST" action="javascript:void(null);" onsubmit="go_logging()">
                <fieldset>
                    <label for="login">Логин</label>
                    <input type="text" name="login" autocomplete="off"  required></input>
                    <label for="password">Пароль</label> 
                    <input type="password" name="password" autocomplete="off" required></input>
                    <input  class="button-xsmall pure-button" type="submit" value="Войти">
                </fieldset>
            </form>
        </center>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
