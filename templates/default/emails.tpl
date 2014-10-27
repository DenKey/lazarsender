{config_load file="lazar.conf"}
{include file="header.tpl" title="Получатели" page_js="emails.js"}

	<div class='body'>
		<p>Добавьте новых пользователей для своих рассылок.</p>
		<p>На добавление каждых 100 пользователей уходит 10 секунд.Если пользователь уже есть в этой группе он не будет добавлен</p>
		<form class="pure-form pure-form-stacked" id="form" method="POST" action="javascript:void(null);"  onsubmit="add_emails()">
			<fieldset>
				<label for="select_group">Выберите группу пользователей</label>
				<select name="select_group">
					{foreach from=$groups_array item=group}
						{assign var="group_name" value=$group.group_name}

						{if count_emails == true}
							<option value="{$group.id}">{$group_name|cat:$group.user_count_str}</option>
						{else}
							<option value="{$group.id}">{$group_name}</option>
						{/if}
					{/foreach}
				</select>
				<label for="create_group">Добавьте в новую</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<label for="separator">Разделитель,если не нужно оставьте поле пустым</label>
				<input type="text" name="separator" autocomplete="off">
				<label for="emails"></label>
				<textarea required name="emails" cols="80" rows="20" placeholder="Введите адреса для добавления в базу данных"></textarea>
				<input  class="button-xsmall pure-button" type="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

{include file="footer.tpl"}