{config_load file="lazar.conf"}
{include file="header.tpl" title="Кампании" page_js="campaings.js"}

<div id="main">
	<div class="content">
	<table class="pure-table">
		<thead>
			<tr><td align='center'><b>ID</b></td>
			<td align='center'><b>Имя кампании</b></td>
			<td align='center'><b>Группы рассылки</b></td>
			<td align='center'><b>Тема письма</b></td>
			<td align='center'><b>Статус</b></td>
			<td align='center'></td>
			<td align='center'></td>
		</thead>
		<tbody>
		 {foreach from=$campaings item=campaing}
		 	<tr><td align="center">{$campaing.id}</td>
			<td align="center"><a href="edit_campaing.php?id={$campaing.id}">{$campaing.name}</a></td>
			<td align="left">{$campaing.group_select_str}</td>
			<td align="center"><textarea cols="40" rows="3" readonly>{$campaing.subject}</textarea></td>
			<td align="center">{if $campaing.emails_count == 0}непосчитано{else}{$campaing.sent_count} из {$campaing.emails_count} {/if}<br>{if $campaing.circulated == 1}Уже отправлена{/if}</td>
			<td align="center"><a href="edit_campaing.php?id={$campaing.id}" title="Редактировать"><img src="{#img_path#}email_edit.png"></img></a>
			<a href="#" title="Удалить" onclick="delete_campaing({$campaing.id},'{$campaing.name}')">
			<img src="{#img_path#}email_delete.png"</img></a>
			<a href="#" onclick="test_send({$campaing.id},'{$campaing.test_email}')" title="Отправить на проверку"><img src="{#img_path#}email_test.png"> </img></a></td>
            <td><a href="sender.php?id={$campaing.id}" title="Разослать"><img src="{#img_path#}email_send.png">
			</img></a></td></tr>
		 {/foreach}
		</tbody>
	</table>
	<br>	
	{$get_result_text}<br>
	{$get_prev_page_link}<br>

	{if $get_page_links != "<span>1</span>"}
		{$get_page_links}
	{/if}

	</div>
</div>
{include file="footer.tpl"}