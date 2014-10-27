{config_load file="lazar.conf"}
{include file="header.tpl" title="Панель управления" page_js="home.js"}


<div class="body">
<p>Добро пожаловать.</p>
<p><b>Lazar Sender 0.1.2</b> позволяет производить отправку сообщений на электронные адреса
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
</div>

<form class="pure-form pure-form-stacked" method="POST" action="javascript:void(null);" onsubmit="update({$smarty.session.user_id})">
		<fieldset>
				<textarea id="notes" cols="100" rows="8">{$notes}</textarea>
				<input  class="button-xsmall pure-button" type="submit" value="Сохранить">
		</fieldset>
	</form>
</div>

{include file="footer.tpl"}