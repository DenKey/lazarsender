{config_load file="lazar.conf"}
{include file="header.tpl" title="Ошибка"}

<div id="main">
	<div class="content">
	<div class="ui-widget">
		<div class="ui-state-error ui-corner-all" style="padding: 0 .7em;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
		<strong>Ошибка:</strong>{$error_message}<br>{$system_error_message}</p>
		</div>
	</div>
	</div>
</div>

{include file="footer.tpl"}