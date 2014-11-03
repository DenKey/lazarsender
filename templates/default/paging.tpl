<p>{$get_result_text}</p>
<ul class="pure-paginator">
	{if !empty($get_prev_page_link)}
	<li><a class="pure-button prev" href="{$get_prev_page_link[0]}">{$get_prev_page_link[1]}</a></li>
	{/if}
		{foreach from=$get_page_links item=page}
		{if is_array($page)}
			    	<li><a class="pure-button" href="{$page[0]}">{$page[1]}</a></li>
			  {else}			    	
			    	<li><a class="pure-button pure-button-active" href="">{$page}</a></li>
		{/if} 
		{/foreach}
	{if !empty($get_next_page_link)}
	<li><a class="pure-button next" href="{$get_next_page_link[0]}">{$get_next_page_link[1]}</a></li>
	{/if}    
</ul>