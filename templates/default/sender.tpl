{config_load file="lazar.conf"}
{include file="header.tpl" title="Кампания разослана"}

<div class="body">
	{if isset($full)}
		<div class="ui-widget">
			<div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
			<p><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
			<strong>Внимание !</strong> Кампания была успешно разослана по всем адресам</p>
			</div>
		</div>
	{/if}
	<p>За сеанс отправлено {$counter} из {$emails_num}</p>
	<p>Всего за кампанию оправлено {$all_campaing_sent} писем</p>
	<p>Проверьте дневные лимиты на всех ваших аккаунтах</p>
</div>

{include file="footer.tpl"}