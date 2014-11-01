{config_load file="lazar.conf"}
{include file="header.tpl" title="Логи" page_js="logs.js"}


	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Почтовые логи</a></li>
			<li><a href="#tabs-2">Логи сайта</a></li>
		</ul>

		<div id="tabs-1">
		<form class="pure-form pure-form-stacked">
		<textarea cols="90" rows="30" placeholder="empty">{if isset($mail_log)}{$mail_log}{/if}</textarea>
		<input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(0);">
		</form>
		  
		</div>

		<div id="tabs-2">
		<form class="pure-form pure-form-stacked">
		<textarea cols="90" rows="30" placeholder="empty">{if isset($site_log)}{$site_log}{/if}</textarea>
		<input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(1);">
		</form>
		</div>
	</div>

{include file="footer.tpl"}