{config_load file="lazar.conf"}
{include file="header.tpl" title="Панель управления" page_js="home.js"}


<div id="main">
        <div class="header">
            <h1>Lazar Sender {$script_version}</h1>
            <h2>Добро пожаловать в панель управления</h2>
        </div>

        <div class="content">
            <h2 class="content-subhead">Введение</h2>
            <p>
               <b>Lazar Sender</b> позволяет производить отправку сообщений на электронные адреса пользователей используя аккаунты бесплатных сервисов такие как <a href="http://yahoo.com" target="_blank">Yahoo! Mail</a>; <a href="http://google.com" target="_blank">Gmail</a>; <a href="http://yandex.ru" target="_blank">Yandex Почта</a> и многих других.Рассылка происходит по протоколу <a href="https://en.wikipedia.org/wiki/Simple_Mail_Transfer_Protocol" target="_blank">SMTP</a>.
            </p>

            <h2 class="content-subhead">С чего начать?</h2>
            <p>
                 Алгоритм работы простой,<a href="groups.php" target="_blank">создайте группу</a> пользователей, добавьте в неё emails с помощью <a href="emails.php" target="_blank">веб формы</a> или <a href="upload_emails.php" target="_blank">из файла</a>.<a href="add_senders.php" target="_blank">Добавьте аккаунты</a> с которых будет вестись рассылка писем и укажите SMTP <a href="services.php" target="_blank">настройки сервисов</a>.<a href="add_campaing.php" target="_blank">Создайте кампанию</a> рассылки,при создании необходимо выбрать группу рассылки и добавить содержимое письма.Все готово чтобы <a href="campaings.php" target="_blank">приступить к рассылке</a> писем.
            </p>

           <h2 class="content-subhead">Записывайте все что происходит !</h2>
            <p>
                Успех ваших кампаний и количество писем попадущих в Inbox зависит от вашего тонкого понимания работы спам фильтров, изучайте эффективность кампаний и количество откликов, не ленитесь как можно чаще делать заметки относительно хода работы.
            </p>

            <form class="pure-form pure-form-stacked" method="POST" action="javascript:void(null);" onsubmit="update({$smarty.session.user_id})">
			<fieldset>
					<textarea id="notes" cols="100" rows="8">{$notes}</textarea>
					<input  class="button-xsmall pure-button" type="submit" value="Сохранить">
			</fieldset>
			</form>

            <h2 class="contetn-subhead">Это важно...</h2>
            <p>
            	<div class="ui-widget">
				  <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
							<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
							Прежде чем начать рассылку <a href="smtp_test.php">проверьте</a>
							правильность настройки SMTP сервисов с которыми вы работаете, и удостоверьтесь что ваш сервер позволяет работать с SMTP рассылкой. Многие Shared хостинги ограничивают своих пользователей в этом, чтобы включить такую возможность обратитесь в техподдержку своего хостера или же установите скрипт на локальной машине.</p>
				  </div>
				</div>
            </p>
        </div>
    </div>

{include file="footer.tpl"}