function edit_service(service_id) {
	$.ajax({
		type: "POST",
		url: "handlers/senders/select_service.php",
		data: {
			id: service_id
		},
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function(result) {
		var obj_from_json = JSON.parse(result);

		edit_field(service_id, obj_from_json);
	});

}

function edit_field(service_id, obj_from_json) {

	var states = {
		state0: {
			title: "Редактирование сервиса",
			html: '<p><b>Id: ' + service_id + '</b><p>' +
				'<input type="text" name="service" value="' + obj_from_json.service + '"><b>Service</b></br>' +
				'<input type="text" name="server" value="' + obj_from_json.server + '"><b>Server</b></br>' +
        '<input type="text" name="crypt" value="' + obj_from_json.crypt + '"><b>Encryption</b></br>' +
				'<input type="number" min="1" name="port" value="' + obj_from_json.port + '"><b>Port</b><br />' +
				'<input type="number" min="1" name="daylimit" value="' + obj_from_json.daylimit + '"><b>(Limit per day)</b><br />',
			buttons: {
				"Сохранить": true,
				"Выйти": false
			},
			submit: function(e, v, m, f) {
				if (v) {
					$.ajax({
						type: "POST",
						url: "handlers/senders/edit_service.php",
						data: {
							id: service_id,
							server: f.server,
							port: f.port,
							daylimit: f.daylimit,
							service: f.service,
              crypt: f.crypt
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


 function delete_service(service_id,name) {
 	$.prompt("Удалить сервис '"+name+"' и всю информацию о нем ?", {
 		title: "Вы уверены ?",
 		buttons: {
 			"Удалить": true,
 			"Нет,не нужно": false
 		},
 		submit: function(e, v, m, f) {
 			if (v) {
 				delete_ajax(service_id);
 			}
 		}
 	});
 }

  function delete_ajax(service_id) {
  	$.ajax({
  		type: "POST",
  		url: "handlers/senders/delete_service.php",
  		data: {
  			id: service_id
  		},
  		error: function(xhr, str) {
  			alert('Возникла ошибка: ' + xhr.responseCode);
  		}
  	}).done(function() {
  		window.location.reload();
  	});
  }


  function add_service() {
  	var states = {
  		state0: {
  			title: "Добавление сервиса",
  			html: '<input type="text" name="service" value=""><b>Service</b></br>' +
  				'<input type="text" name="server" value=""><b>Server</b></br>' +
          '<input type="text" name="crypt" value=""><b>Encryption</b><br />' +
  				'<input type="number" min="1" name="port" value=""><b>Port</b><br />' +
  				'<input type="number" min="1" name="daylimit" value=""><b>(Limit per day)</b><br />',
  			buttons: {
  				"Добавить": true,
  				"Выйти": false 
  			},
  			submit: function(e, v, m, f) {
  				if (v) {
  					$.ajax({
  						type: "POST",
  						url: "handlers/senders/add_service.php",
  						data: {
  							server: f.server,
  							port: f.port,
  							daylimit: f.daylimit,
  							service: f.service,
                crypt: f.crypt
  						},
  						error: function(xhr, str) {
  							alert('Возникла ошибка: ' + xhr.responseCode);
  						}
  					}).done(function(result) {
  						if (result == "success") {
  							window.location.reload();
  						} else if (result == "dublicate") {
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
  			html: "В базе уже есть сервис с таким именем.",
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