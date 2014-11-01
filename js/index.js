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