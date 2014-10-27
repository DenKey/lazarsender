

function edit_sender(sender_id) {
	$.ajax({
		type: "POST",
		url: "handlers/senders/select_sender.php",
		data: {
			id: sender_id
		},
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function(result) {
		var obj_from_json = JSON.parse(result);

		edit_field(sender_id, obj_from_json);
	});

}

function edit_field(sender_id, obj_from_json) {

	var states = {
		state0: {
			title: "Редактирование аккаунта",
			html: '<script type="text/javascript">'+
				'$(document).ready(function(){'+
				'$("#datepicker").datepicker({ autoSize: true , dateFormat: "yy-mm-dd" });'+
				'$("#datepicker").datepicker("setDate", "'+obj_from_json.lastsending+'" );'+
				'});</script>'+
				'<p><b>Id: ' + sender_id + '</b><p>' +
				'<input type="text" name="email" value="' + obj_from_json.email + '"><b>Email</b></br>' +
				'<input type="text" name="password" value="' + obj_from_json.password + '"><b>Password</b></br>' +
				'<input type="text" name="login" value="' + obj_from_json.login + '"><b>Login</b><br />' +
				'<input type="text" name="service" value="' + obj_from_json.service + '"><b>Service</b><br />'+
				'<p>Последнее использование</p>'+
				'<div id="datepicker"></div>',
			buttons: {
				"Сохранить": true,
				"Выйти": false
			},
			submit: function(e, v, m, f) {
				var date = $( "#datepicker" ).datepicker( "getDate");
				var finalDate = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate();
				console.log(finalDate);
				if (v) {
					$.ajax({
						type: "POST",
						url: "handlers/senders/edit_sender.php",
						data: {
							id: sender_id,
							email: f.email,
							password: f.password,
							login: f.login,
							service: f.service,
							lastsending: finalDate
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

function delete_sender(sender_id) {
	$.ajax({
		type: "POST",
		url: "handlers/senders/delete_sender.php",
		data: {
			id: sender_id
		},
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function() {
		window.location.reload();
	});
}