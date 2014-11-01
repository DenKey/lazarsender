{config_load file="lazar.conf"}
{include file="header.tpl" title="Редактировать кампанию"}

{literal}
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript" src="js/edit_campaing.js"></script>
{/literal}


<div id="main">
	<div class="content">
	<form class="pure-form pure-form-stacked" id="edit_campaing" method="POST" action="javascript:void(null);" onsubmit="edit_campaing(1)">
		<fieldset>
			<label for="name">Имя кампании
			<input type="text" name="name" size="30" autocomplete="off" maxlength="20" required><br>
			<label for="">Группы адресов которым будет произведена рассылка.Если вы хотите сделать рассылку по другим группам, создайте новую кампанию.</label>
			{$group_select_str}
			<label for="subject">Тема письма
			<input type="text" name="subject" size="100" autocomplete="off" maxlength="150" required><br>
			<textarea name="html_str" id="editor"></textarea><br>
			<input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить и выйти">
		</fieldset>
	</form>
	</div>	   
</div>
{include file="footer.tpl"}