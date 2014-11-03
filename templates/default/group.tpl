{config_load file="lazar.conf"}
{include file="header.tpl" title="Просмотр группы" page_js="group.js"}


<div id="main">
        <div class="content">
		  {if $count == 0 }
		  		<p align='center'>В группе еще нет адресов</p>
		  {else}
			<table class="pure-table">
				<thead>
		  			<tr>
				   		<td align="center">ID</td>
				   		<td align="center">Адрес</td>
				    	<td align="center">Добавлен</td>
				    	<td align="center"></td>				    			
					</tr>
				</thead>
				<tbody>
					{foreach from=$group_emails item=row}
					<tr><td align="center">{$row.id}</td><td align='center'>{$row.email}</td><td>{$row.created}</td><td><a href="#" onclick="delete_email({$row.id})">
					<img src="{#img_path#}delete.png" weight="17" height="17"></img></a></td></tr>
					{/foreach}
				</tbody>
			</table>
{include file="paging.tpl" get_prev_page_link=$get_prev_page_link get_next_page_link=$get_next_page_link get_page_links=$get_page_links get_result_text=$get_result_text}
		
		{/if}

		</div>
</div>
{include file="footer.tpl"}