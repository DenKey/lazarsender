function go_logging() {
	var msg = $('#login').serialize();
	$.ajax({
		type: "POST",
		url: "handlers/admin/singin.php",
		data: msg,
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function (result) {
		if (result == "wrong") {
			var n = noty({
				text: 'Вы ввели неверный логин или пароль',
				type: 'error',
				layout: 'topCenter'
			});
		}

		if (result == "success") {
			window.location = "home.php";
		} 
	});
}

  function reset_password() {
  	var states = {
  		state0: {
  			title: "Сброс пароля",
  			html: '<input type="text" name="login" required><b>Login</b></br>' +
  				  '<input type="text" name="email" required><b>Email</b></br>',
  			buttons: {
            "Сбросить пароль": true
  			},
  			submit: function(e, v, m, f) {
  				if (v) {
  					$.ajax({
  						type: "GET",
  						url: "handlers/admin/lostpass.php",
  						data: {
  							login:  f.login,
  							email: 	f.email
  						},
  						error: function(xhr, str) {
  							alert('Возникла ошибка: ' + xhr.responseCode);
  						}
  					}).done(function(result) {
  						if (result == "notfill") {
  							$.prompt.goToState('state1');
  						} else if (result == "nothing") {
  							$.prompt.goToState('state2');
  						} else if (result == "mailerror") {
  							$.prompt.goToState('state3');
  						} else if (result == "sent"){
  							$.prompt("Письмо с инструкциями отправлено вам на почту");
  						}
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
  			title: "Пользователь не найден",
  			html: "Пожалуйста попробуйте ввести логин и пароль еще раз",
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
  		state3: {
  			title: "Не можем отправить письмо",
  			html: "В результате проблем на сервере мы не можем отправить письмо,пожалуйста обратитесь как администратору",
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