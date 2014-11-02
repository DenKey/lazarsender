<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <script type="text/javascript" src="js/jquery-impromptu.js"></script>
    <script type="text/javascript" src="js/noty/packaged/jquery.noty.packaged.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    <link rel="stylesheet" type="text/css" href="templates/default/css/jquery-impromptu.css">
    <link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-min.css">
    <link rel="stylesheet" type="text/css" href="templates/default/css/pure/pure-skin-blue.css">
    <link rel="stylesheet" type="text/css" href="templates/default/css/jquery-ui.css" >
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <title>Lazar Sender</title>
    <style type="text/css">
        .login {
              position: relative;
              margin: 150px auto 0 auto;
              padding: 20px 20px 20px;
              width: 300px;
              background: #1f8dd6;
              border-radius: 15px;
              -webkit-box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
              box-shadow: 0 0 200px rgba(255, 255, 255, 0.5), 0 1px 2px rgba(0, 0, 0, 0.3);
        }

        .login span{
            font-family: fantasy;
            font-size: 24px;
            color: white;
        }
        .login a{
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body class="pure-skin-blue">
{if isset($smarty.get.error_message)}
        <script type="text/javascript">
            var n = noty({
                text        : "{$smarty.get.error_message}",
                type        : 'error',
                layout      : 'topCenter',
             });
        </script>
{/if}        
{if isset($code)}
    <script type="text/javascript">
    change_pas();
function change_pas(){
var states = {
        state0: {
            title: "Введите новый пароль",
            html: '<input type="text" name="pass" required><b>Password</b></br>',
            buttons: {
            "Изменить пароль": true
            },
            submit: function(e, v, m, f) {
                if (v) {
                    $.ajax({
                        type: "GET",
                        url: "handlers/admin/newpass.php",
                        data: {
                            password:  f.pass,
                            code:  "{$code}"
                        },
                        error: function(xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    }).done(function (data) {
                        var result = JSON.parse(data);
                        if (result == "wrong") {
                            $.prompt.goToState('state2');
                        }
                        if (result == "success") {
                            $.prompt.goToState('state3');
                        };
                    });
                }
                return false;
            }
        },
        state1: {
            title: "Не все поля заполнены!",
            html: "Одно из полей не было заполнено.",
            buttons: {
                "Закрыть": 0,
                "Назад": -1
            },
            focus: 0,
            submit: function(e, v, m, f) {
                e.preventDefault();
                if (v == 0)
                    $.prompt.close();
                else if (v == -1)
                    $.prompt.goToState('state0');
            }
        },
        state2: {
            title: "Запрос не найден",
            html: "Невозможно совершить сброс пароля,попробуйте снова",
            buttons: {
                "Закрыть": 0
            },
            focus: 0,
            submit: function(e, v, m, f) {
                e.preventDefault();
                if (v == 0)
                    $.prompt.close();
                else if (v == -1)
                    $.prompt.goToState('state0');
            }
        },
        state3: {
            title: "Пароль изменен",
            html: "Пароль успешно изменен, можете войти в аккаунт",
            buttons: {
                "Закрыть": 0,
            },
            focus: 0,
            submit: function(e, v, m, f) {
                e.preventDefault();
                if (v == 0)
                    $.prompt.close();
                else if (v == -1)
                    $.prompt.goToState('state0');
            }
        }
    }

    $.prompt(states);  
}         
    </script>
{/if}        

<div class="login">
        <center>
            <span>Lazar Sender {$script_version}</span>
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
        <a href="#" onclick="reset_password()">Забыли пароль?</a><br>
</div>

</body>
</html>