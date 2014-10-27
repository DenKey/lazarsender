{config_load file="lazar.conf"}
{include file="header.tpl" title="Логи" page_js="logs.js"}

	<div class=body id="tabs">
		<ul>
			<li><a href="#tabs-1">Почтовые логи</a></li>
			<li><a href="#tabs-2">Логи сайта</a></li>
		</ul>

		<div id="tabs-1">
		  <textarea cols="100%" rows="15" placeholder="empty">{if isset($mail_log)}{$mail_log}{/if}</textarea>
		    <input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(0);">
		</div>

		<div id="tabs-2">
		<textarea cols="100%" rows="15" placeholder="empty">{if isset($site_log)}{$site_log}{/if}</textarea>
		<input class="button-xsmall pure-button" type="button" value="Очистить" onclick="clear_logs(1);">
		</div>
	</div>

{include file="footer.tpl"}