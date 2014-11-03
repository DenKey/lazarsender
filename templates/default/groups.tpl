{config_load file="lazar.conf"}
{include file="header.tpl" title="Управление группами адресов" page_js="groups.js" page_style="groups.css"}


<div id="main">
	<div class="content">
		<div>
			<form class="pure-form" method="POST" id="formx" action="javascript:void(null);" onsubmit="add_group()">
				<label for="create_group">Добавить новую группу</label>
				<input type="text" name="create_group" autocomplete="off" placeholder="Имя группы" maxlength="25">
				<input class="button-xsmall pure-button" type="submit" value="Добавить" name="submit">
			</form>
		</div>
		<h3>Все группы адресов</h3>
		<table class="pure-table">
		{foreach from=$groups item=group}
			<tr><td><a href="group.php?group_id={$group.id}">{$group.group_name}{$group.user_count}</a></td><td><a href='#' onclick="edit_group('{$group.group_name}',{$group.id})"><img src="templates/default/images/edit.png"></img></a></td><td><a href='#' onclick="delete_group('{$group.group_name}',{$group.id})">
			<img src="templates/default/images/delete.png" weight="17" height="17"></img></a></td></tr>

		{foreachelse}
			<p>Нет добавленных групп</p>
		{/foreach}
		</table>
{include file="paging.tpl" get_prev_page_link=$get_prev_page_link get_next_page_link=$get_next_page_link get_page_links=$get_page_links get_result_text=$get_result_text}
</div>
</div>		
{include file="footer.tpl"}