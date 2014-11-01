{config_load file="lazar.conf"}
{include file="header.tpl" title="Настройки" page_js="settings.js"}



<div id="tabs">
    <ul>
      <li><a href="#tabs-1">Интерфейс</a></li>
      <li><a href="#tabs-2">Отладка рассылок</a></li>
      
         {if $smarty.session.group}
            <li><a href="#profile">Профиль</a></li>
         {else}
            <li><a href="#users">Пользователи</a></li>
         {/if}	
    </ul>
  <div id="tabs-1">
   <form class="pure-form" id="formx" method="POST" action="javascript:void(null);" onsubmit="save_settings()">
         <fieldset>
          <p><b>Отображать количество адресов рядом с названием групп:</b><br>
          <div id="radio">
             <input type="radio" id="radio1" name="count_emails" {if $count_emails} checked {/if} value="1"><label for="radio1">Отображать</label>
             <input type="radio" id="radio2" name="count_emails" {if !$count_emails} checked {/if} value="0"><label for="radio2">Нет</label>
             </div><br>
               <p><b>Количество отображаемых аккаунтов на странице:</b><br>
               <input type="number" min="5" name="accounts_number" value="{$accounts_number}"><br>
               <br>
               <p><b>Количество отображаемых групп на странице:</b><br>
               <input type="number" min="5" name="groups_number" value="{$groups_number}"><br>
               <br>
               <p><b>Количество адресов отображаемых на странице при просмотре группы:</b><br>
               <input type="number" min="5" name="emails_number" value="{$emails_number}"><br>
               <br>
                <p><b>Количество сервисов отображаемых на странице:</b><br>
               <input type="number" min="5" name="service_number" value="{$service_number}"><br>
               <br>
               <p><b>Количество кампаний отображаемых на странице:</b><br>
             <input type="number" min="5" name="campaings_number" value="{$campaings_number}"><br>
               <br>
             <input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить">
 			<input class="button-xsmall pure-button" type="button" name="default" value="По Умолчанию" onclick="reset_to_default()">
         </fieldset>
      </form>
    </div>

    <div id="tabs-2">
      <form class="pure-form" id="formx2" method="POST" action="javascript:void(null);" onsubmit="save_settings_tab2()">
         <fieldset>
               <p><b>Адрес на который будут отправлятся тестовые письма:</b><br>
               <input type="text" name="test_email" value="{$test_email}"><br>
               <br>
               <input class="button-xsmall pure-button" type="submit" name="submit" value="Сохранить">
               <input class="button-xsmall pure-button" type="button" name="default" value="По Умолчанию" onclick="reset_to_default()">
         </fieldset>
      </form>
   </div>

    {if $smarty.session.group}
            <div id="profile">
               <input class="button-small pure-button" type='button' name='edit_profile' value='Редактировать данные' onclick="edit_user('{$smarty.session.login}',{$smarty.session.user_id})">
            </div>
    {else}
        <div id="users">
			<input class="button-xsmall pure-button" type="button" name="add_user" value="Добавить" onclick="add_user()">
			 <br><br>
			 <table class="pure-table">
			     <thead>
			       <tr>
			           <td>id</td>
			           <td>Логин</td>
			           <td>Email</td>
			           <td>Группа</td>
			           <td></td>
			           <td></td>
			        </tr>  
			     </thead>
			      <tbody>
			      {foreach from=$admins item=admin}
			      	<tr><td>{$admin.id}</td>
                    <td>{$admin.login}</td>
                    <td>******</td>
                    <td>{$admin.email}</td>
                    <td>{$admin.group}</td>                      
                    <td><a href="#" onclick="edit_user('{$admin.login}',{$admin.id})"><img src="{#img_path#}edit.png"></img></a> 
                    <a href='#' onclick="delete_user('{$admin.login}',{$admin.id})">
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
    {/if}


</div>               
{include file="footer.tpl"}
