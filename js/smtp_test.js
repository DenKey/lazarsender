function test(){
	var msg = $('#test_smtp').serialize();
	$.ajax({
		type: "POST",
		url: "tools/smtp.php",
		data: msg,
		error: function (xhr, str){
				alert('Возникла ошибка: ' + xhr.responseCode);
			   },
		beforeSend: function() {
			var n = noty({
				text: 'Ожидайте окончания запроса...',
				layout: 'top',
    			type: 'information',
			});
		},
        complete: function()  {  $.noty.closeAll(); }
	}).done(function (result){
		console.log(result);
		$("[name|='view']").val(result);
	});
}