{config_load file="lazar.conf"}
{include file="header.tpl" title="Добавить кампанию" page_js="add_campaing.js"}

{literal}
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
				selector: "#editor",
		        plugins: [
		                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
		                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		                "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
		        ],

		        toolbar1: "fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
		        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

		        menubar: false,
		        toolbar_items_size: 'small',

		        style_formats: [
		                {title: 'Bold text', inline: 'b'},
		                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		                {title: 'Example 1', inline: 'span', classes: 'example1'},
		                {title: 'Example 2', inline: 'span', classes: 'example2'},
		                {title: 'Table styles'},
		                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		        ],

		        templates: [
		                {title: 'Test template 1', content: 'Test 1'},
		                {title: 'Test template 2', content: 'Test 2'}
		        ],
		        height: 300,
				cleanup: true,
				language: 'ru'
			});
</script>
{/literal}

<div class="body">
	<form class="pure-form pure-form-stacked" id="add_campaing" method="POST" action="javascript:void(null);" onsubmit="add()">
	  <fieldset>
		   <label for="name">Имя кампании
		   <input type="text" name="name" size="30" autocomplete="off" maxlength="35" required><br>
		   <label for="select">Выберите одну или более групп которым будут раcсылаться письма</label>
		   <select name="select[]" required multiple size="1">
		   		{foreach from=$groups item=group}
						{assign var="group_name" value=$group.group_name}

						{if count_emails == true}
							<option value="{$group.id}">{$group_name|cat:$group.user_count_str}</option>
						{else}
							<option value="{$group.id}">{$group_name}</option>
						{/if}
				{/foreach}
		   </select>
		   <label for="subject">Тема письма
		   <input type="text" name="subject" size="100" autocomplete="off" maxlength="150" required><br>
		   <textarea name='html_str' id="editor"></textarea><br>
		   <input class="button-xsmall pure-button" type="submit" name="submit" value="Добавить">
	  </fieldset>
	</form>
</div>

{include file="footer.tpl"}