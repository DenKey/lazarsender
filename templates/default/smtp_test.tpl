{config_load file="lazar.conf"}
{include file="header.tpl" title="Проверка SMTP" page_js="smtp_test.js"}

<div id="main">
<div class="content">
<div class="pure-g">
	<div class="pure-u-1-2">
		<form class="pure-form pure-form-stacked" id="test_smtp" method="POST" action="javascript:void(null);" onsubmit="test()">
	  <fieldset>
		   <label for="host">Адрес сервера
		   <input type="text" name="host" size="30" required><br>
		   <label for="port">Порт
		   <input type="number" min='1' name="port" size="30" required><br>
		   <label for="username">Логин
		   <input type="text" name="username" size="30" required><br>
		   <label for="password">Пароль
		   <input type="text" name="password" size="30"required><br>
		   <label for="crypt">Тип шифрования(например tls или ssl)
		   <input type="text" name="crypt" size="30" required><br>
		   <label for="email">Адрес получателя
		   <input type="text" name="email" size="30" required value="{$test_email}"><br>
		   
		   <input class="button-xsmall pure-button" type="submit" name="submit" value="Отправить">
	  </fieldset>
	</form>
	</div>
    <div class="pure-u-1-2">
    <form class="pure-form pure-form-stacked">
    	<fieldset>
    		<label for="view">После отправки сообщения здесь появится отчет
		    <textarea name='view' cols='50%' rows="25" placeholder="response from the server"></textarea><br>
    	</fieldset>
    </form>
    </div>
	
</div>
</div>
</div>
{include file="footer.tpl"}