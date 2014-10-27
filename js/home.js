function update(user_id) {	
	var msg = $('#notes').val();
	$.ajax({
		type: "POST",
		url: "handlers/admin/save_notes.php",
		data: {
			id: user_id,
			notes: msg
		},
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function (result) {
		if (result == "success") {
			var n = noty({
				text: 'Заметка сохранена',
				type: 'success',
				layout: 'topCenter'
			});
		} else {
			var n = noty({
				text: 'Произошел сбой.Возможно вы пытались сохранить пустые заметки.',
				type: 'error',
				layout: 'topCenter'
			});
		}
	});
}