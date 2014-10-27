{config_load file="lazar.conf"}
{include file="header.tpl" title="Почтовые сервисы" page_js="services.js"}

<div class="body">
	<a class="pure-button pure-button-active" href="#" onclick="add_service()">Добавить сервис</a></br></br>
	<table class="pure-table">
		<thead>
			<tr><td align='center'><b>Id</b></td>
			<td align='center'><b>Service</b></td>
			<td align='center'><b>Server</b></td>
			<td align='center'><b>Port</b></td>
			<td align='center'><b>Шифрование</b></td>
			<td align='center'><b>(Limit per day)</b></td>
			<td align='center'></td>
			<td align='center'></td></tr>
		</thead>
		<tbody>
	 	 {foreach from=$services item=service}
	 	 	<tr><td align="center">{$service.id}</td>
			<td align="center">{$service.service}</td>
			<td align="center">{$service.server}</td>
			<td align="center">{$service.port}</td>
			<td align="center">{$service.crypt}</td>
			<td align="center">{$service.daylimit}</td>
		 <td align="center"><a href="#" onclick="edit_service({$service.id})"><img src="{#img_path#}edit.png">
			<td align="center"><a href="#" onclick="delete_service({$service.id},'{$service.service}')">
			<img src="{#img_path#}delete.png" weight="17" height="17"></img></a></td></tr>
		{/foreach}
		</tbody>
	</table>
	<br>
	{$get_result_text}
	<br>
	{$get_prev_page_link}
	<br>
	{if $get_page_links != "<span>1</span>"}
		{$get_page_links}
	{/if}
</div>				

{include file="footer.tpl"}