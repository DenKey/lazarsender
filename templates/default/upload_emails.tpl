{config_load file="lazar.conf"}
{include file="header.tpl" title="Загрузка из файла"}

{capture name="success"}
	<script type="text/javascript">
				var n = noty({
		            text    : "{$success_str}",
		            type    : 'success',
		            layout  : 'topCenter',
	       		 });
			</script>
{/capture}
{if isset($success_str)}
	{$smarty.capture.success}
{/if}

	<div class="body">
		<h2>Добавьте адреса из файла</h2>
		<p>Адреса должны быть размещены в файле построчно,без посторонних символов</p>
		<form class="pure-form pure-form-stacked" action="/upload.php" method="post" enctype="multipart/form-data">
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
				</select></br>
				<label for="create_group">Добавьте в новую</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<label for="separator">Разделитель,если не нужно оставьте поле пустым</label>
				<input type="text" name="separator" autocomplete="off"><br>
				<label for="file"></label>
				<input type="hidden" name="MAX_FILE_SIZE" value="4000000000" />
				<input type="file" accept="text/plain" name="filename">
				<input class="button-xsmall pure-button" type="submit" name="submit" value="Добавить">
			</fieldset>
		</form>
	</div>

{include file="footer.tpl"}