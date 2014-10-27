{config_load file="lazar.conf"}
{include file="header.tpl" title="Главная" page_js="index.js"}

{capture name="error"}
    {literal}
        <script type="text/javascript">
            var n = noty({
                text        : "$smarty.get.error_message",
                type        : 'error',
                layout      : 'topCenter',
             });
        </script>
    {/literal}
{/capture}



<div class="body">
        <center>
            <form class="pure-form pure-form-stacked" id="login" method="POST" action="javascript:void(null);" onsubmit="go_logging()">
                <fieldset>
                    <label for="login">Логин</label>
                    <input type="text" name="login" autocomplete="off"  required></input>
                    <label for="password">Пароль</label> 
                    <input type="password" name="password" autocomplete="off" required></input>
                    <input  class="button-xsmall pure-button" type="submit" value="Войти">
                </fieldset>
            </form>
        </center>
</div>

{include file="footer.tpl"}