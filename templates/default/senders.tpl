{config_load file="lazar.conf"}
{include file="header.tpl" title="Просмотр аккаунтов" page_js="senders.js"}

<div class="body">
	<table class="pure-table">
			<thead>
			 <tr align="center"><td><b>ID</b></td>
				<td align="center"><b>Email</b></td>
				<td align="center"><b>Password</b></td>
				<td align="center"><b>Login</b></td>
				<td align="center"><b>Service</b></td>
				<td align="center"><b>Last Use</b></td>
				<td></td>
				<td></td>
			 </tr>
			</thead>
			<tbody>
			{foreach from=$senders item=sender}
				<tr><td>{$sender.id}</td>
				<td align="center">{$sender.email}</td>
				<td align="center">{$sender.password}</td>
				<td align="center">{$sender.login}</td>
				<td align="center">{$sender.service}</td>
				<td align="center">{$sender.lastsending}</td>
				<td><a href="#" onclick="edit_sender({$sender.id})"><img src="templates/default/images/edit.png"></img></a></td>
				<td><a href="#" onclick="delete_sender({$sender.id})">
				<img src='templates/default/images/delete.png' weight='17' height='17'></img></a></td></tr>
			{/foreach}
			</tbody>
			</table><br>
				{$get_result_text}
				<br>
				{$get_prev_page_link}
				<br>
				{if $get_page_links != "<span>1</span>"}
					{$get_page_links}
				{/if}
</div>

{include file="footer.tpl"}