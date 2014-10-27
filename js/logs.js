$(function() {
    	$( "#tabs" ).tabs();
});

function clear_logs(num){
	$.ajax({
		type: "POST",
		url: "handlers/admin/clear_logs.php",
		data: {
			log: num
		},
		error: function (xhr, str){
					var n = noty({
			            text        : 'Возникла ошибка: ' + xhr.responseCode + '. '+str,
			            type        : 'error',
			            layout      : 'topCenter',
	        		});
			   }
	}).done(function (result){
		if (result == 'mailsender') {
			var n = noty({
	            text        : "SMTP log cleared",
	            type        : 'success',
	            layout      : 'topCenter',
        	});
        	setTimeout(function() {
      			window.location.reload();
			}, 1500);
		} else if (result == 'site') {
			var n = noty({
	            text        : "Site log cleared",
	            type        : 'success',
	            layout      : 'topCenter',
        	});
        	setTimeout(function() {
      			window.location.reload();
			}, 1500);
		} else if (result == 'notselect') {
			var n = noty({
	            text        : "Options are not selected",
	            type        : 'error',
	            layout      : 'topCenter',
        	});
		} else {
			var n = noty({
	            text        :  result,
	            type        : 'error',
	            layout      : 'topCenter',
        	});
		}
	});
}
