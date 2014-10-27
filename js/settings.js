$(function() {
    $( "#radio" ).buttonset();
    $( "#tabs" ).tabs();
});


function save_settings(){
    	var msg = $('#formx').serialize();
    	$.ajax({
    		type: "POST",
    		url: "handlers/admin/apply_settings.php",
    		data: msg,
    		error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
    	}).done(function (){
            alert('Изменения вступили в силу');
    		window.location.reload();
    	});
    }

    function save_settings_tab2(){
        var msg = $('#formx2').serialize();
        $.ajax({
            type: "POST",
            url: "handlers/admin/apply_settings.php",
            data: msg,
            error:  function(xhr, str){
                alert('Возникла ошибка: ' + xhr.responseCode);
            }
        }).done(function (){
            alert('Изменения вступили в силу');
            window.location.reload();
        });
    }

    function reset_to_default() {
        $.prompt("Вы действительно хотите установить все настройки по умолчанию ?", {
            title: "Вы уверены ?",
            buttons: {
                "Сбросить настройки": true,
                "Нет,не нужно": false
            },
            submit: function(e, v, m, f) {
                if (v) {
                    $.ajax({
                        type: "POST",
                        url: "handlers/admin/default_settings.php",
                        error: function(xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    }).done(function() {
                        alert('Настройки были сброшены');
                        window.location.reload();
                    });
                }
            }
        });
    }

    function add_user() {
    var states = {
        state0: {
            title: "Добавить пользователя",
            html:'<input type="text"     name="login"    value=""><b>Логин</b></br>' +
                 '<input type="text"     name="password" value=""><b>Пароль</b></br>' +
                 '<input type="text"     name="email"    value=""><b>Email</b><br />',
            buttons: {
                "Добавить": true,
                "Выйти": false
            },
            submit: function(e, v, m, f) {
                if (v) {
                    $.ajax({
                        type: "GET",
                        url: "handlers/admin/add_user.php",
                        data: {
                            login:    f.login,
                            password: f.password,
                            email:    f.email
                        },
                        error: function(xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    }).done(function(result) {
                        console.log(result);
                        if (result == "1") {
                            window.location.reload();
                        } else if (result == "0") {
                            $.prompt.goToState('state1');
                        } else {
                            $.prompt.goToState('state2');
                        }
                    });
                }
                return false;
            }
        },
        state1: {
            title: "Обнаружен дубликат!",
            html: "В базе уже есть пользователь с таким логином.",
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
            title: "Добавление не выполнено!",
            html: "Пожалуйста заполните все поля.",
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
        }
    }

    $.prompt(states);
  }

   function delete_user(name,user_id) {
    $.prompt("Удалить пользователя '"  +name+"' и всю информацию о нем ?", {
        title: "Вы уверены ?",
        buttons: {
            "Удалить": true,
            "Нет,не нужно": false
        },
        submit: function(e, v, m, f) {
            if (v) {
                delete_send(user_id);
            }               
        }
    });
 }

  function delete_send(d) {
    $.ajax({
        type: "POST",
        url: 'handlers/admin/delete_user.php',
        data: {
            id: d
        },
        error: function(xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    }).done(function (result) {
        window.location.reload();
    });
  }


  function edit_user(login,user_id) {
    $.ajax({
        type: "POST",
        url: "handlers/admin/select_user.php",
        data: {
            id: user_id
        },
        error: function(xhr, str) {
            alert('Возникла ошибка: ' + xhr.responseCode);
        }
    }).done(function(result) {
        var obj_from_json = JSON.parse(result);

        edit_field(login, user_id, obj_from_json);
    });

}

function edit_field(login, user_id, obj_from_json) {

    var states = {
        state0: {
            title: "Редактирование пользователя '"+login+"'",
            html:'<p><b>Id: ' + user_id + '</b><p>' +
                 '<input type="text"     name="login"    value="' + obj_from_json.login + '">    <b>Логин</b></br>' +
                 '<input type="text"     name="password" value=""> <b>Введите новый пароль</b></br>' +
                 '<input type="text"     name="email"    value="' + obj_from_json.email + '">    <b>Email</b><br />',   
           buttons: {
                "Сохранить": true,
                "Выйти": false
            },
            submit: function(e, v, m, f) {
                if (v) {
                    $.ajax({
                        type: "POST",
                        url: "handlers/admin/edit_user.php",
                        data: {
                            id:       user_id,
                            login:    f.login,
                            password: f.password,
                            email:    f.email
                        },
                        error: function(xhr, str) {
                            alert('Возникла ошибка: ' + xhr.responseCode);
                        }
                    }).done(function(result) {
                        if (result) {
                            window.location.reload();
                        };
                    });
                }
            }
        }
    }

    $.prompt(states);
}