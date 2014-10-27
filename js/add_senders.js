function add_senders(){
	var acc = $('#acc').val();
	var auth = $('#auth').val();
	if ($.trim(acc) == $.trim(auth)) {
		alert('Разделители не могут быть равны');
	}	else {
		var msg = $('#senders').serialize();

		$.ajax({
			type: "POST",
			url: "handlers/senders/add_senders.php",
			data: msg,
			error: function (xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
			}
		}).done(function (result){
			var n = noty({
				text: result,
				type: 'success',
				layout: 'topCenter',
			});
			$("[name|='acc_separator']").val('');
			$("[name|='auth_separator']").val('');
			$("[name|='accounts']").val('');
		});
	}
}