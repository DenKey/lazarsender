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

        <script type="text/javascript">
            var n = noty({
                text        : "{$smarty.get.error_message}",
                type        : 'error',
                layout      : 'topCenter',
             });
        </script>

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
        <a href="#">Забыли пароль?</a><br>
</div>

</body>
</html>