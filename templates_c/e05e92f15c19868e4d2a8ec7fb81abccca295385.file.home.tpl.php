<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-10-23 21:21:33
         compiled from "./templates/default/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:397366720544598dcdf39a1-96479290%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e05e92f15c19868e4d2a8ec7fb81abccca295385' => 
    array (
      0 => './templates/default/home.tpl',
      1 => 1414088100,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '397366720544598dcdf39a1-96479290',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_544598dce455a6_36036245',
  'variables' => 
  array (
    'notes' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_544598dce455a6_36036245')) {function content_544598dce455a6_36036245($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("lazar.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>"Панель управления",'page_js'=>"home.js"), 0);?>



<div class="body">
<p>Добро пожаловать.</p>
<p><b>Lazar Sender 0.1.1</b> позволяет производить отправку сообщений на электронные адреса
пользователей используя аккаунты бесплатных сервисов.Рассылка происходит по протоколу SMTP.
Алгоритм работы простой, создайте группу пользователей, добавьте в неё емеилы с помощью веб формы или из файла.
Добавьте аккаунты и SMTP настройки сервисов.Затем можете создать кампанию рассылки, где необходимо выбрать группу рассылки и добавить собственно тему письма и его "тело".Затем во вкладке Кампании->"Управление" можно  приступить к рассылке писем.</p>
<p>Успех ваших кампаний и количество писем попадущих в Inbox зависит от вашего тонкого понимания работы 
спам фильтров, изучайте эффективность кампаний и количество откликов, не ленитесь как можно чаще делать пометки.</p>

<div class="ui-widget">
	<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
		<strong>Внимание !</strong> Прежде чем начать рассылку <a href="smtp_test.php">проверьте</a>
		правильность настройки SMTP сервисов с которыми вы работаете, и удостоверьтесь что ваш сервер позволяет работать с SMTP рассылкой. Многие Shared хостинги ограничиввают своих пользователей в этом, чтобы включить такую возможность обратитись в техподдержку своего хостера или же установите скрипт на локальной машине.</p>
	</div>
	<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Также:</strong> Сейчас вы находитесь на демонстрационном сайте чей хостинг запрещает SMTP запросы к другим серверам.Режим рассылки с множественных аккунтов здесь не работает.</p>
	</div>
</div>

<form class="pure-form pure-form-stacked" method="POST" action="javascript:void(null);" onsubmit="update(<?php echo $_SESSION['user_id'];?>
)">
		<fieldset>
				<textarea id="notes" cols="100" rows="8"><?php echo $_smarty_tpl->tpl_vars['notes']->value;?>
</textarea>
				<input  class="button-xsmall pure-button" type="submit" value="Сохранить">
		</fieldset>
	</form>
</div>

<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>
