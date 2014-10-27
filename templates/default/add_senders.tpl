{config_load file="lazar.conf"}
{include file="header.tpl" title="Аккаунты" page_js="add_senders.js"}

	<div class='body'>
		<p>Добавьте аккаунты для рассылки сообщений.На добавление каждых 100 аккаунтов уходит 10 секунд.Если аккаунт уже есть в базе он не будет добавлен.
		Аккаунты должны быть в формате email:password</p>
		<form class="pure-form pure-form-stacked" id="senders" method="POST" action="javascript:void(null);" onsubmit="add_senders()">
			<fieldset>
				<label for="acc_separator">Разделитель аккаунтов,если не нужно оставьте поле пустым</label>
				<input type="text" id="acc" name="acc_separator" autocomplete="off">
				<label for="auth_separator">Разделитель логинов от паролей</label>
				<input type="text" id="auth" name="auth_separator" autocomplete="off" required>
				<label for="accounts"></label>
				<textarea required name="accounts" cols="80" rows="20" placeholder="admin@gmail.com:qwerty" required></textarea></br>
				<input class="button-xsmall pure-button" type="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

{include file="footer.tpl"}