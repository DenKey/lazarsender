function add_emails(){
	 
	var msg = $('#form').serialize();
	$.ajax({
		type: "POST",
		url: "handlers/emails/add_emails.php",
		data: msg,
		error: function (xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
			   }
	}).done(function (result){
		var n = noty({
            text        : result,
            type        : 'success',
            layout      : 'topCenter',
        });
		$("[name|='emails']").val('');
		$("[name|='create_group']").val('');
		$("[name|='separator']").val('');
	});
}


