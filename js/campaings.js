function delete_campaing (campaing_id,campaing_name) {
 	$.prompt("Удалить кампанию '"+campaing_name+"' и всю информацию о ней ?", {
 		title: "Вы уверены ?",
 		buttons: {
 			"Удалить": true,
 			"Нет,не нужно": false
 		},
 		submit: function(e, v, m, f) {
 			if (v) {
 				delete_ajax(campaing_id);
 			}
 		}
 	});
 }

 function delete_ajax(campaing_id) {
  	$.ajax({
  		type: "POST",
  		url: "handlers/campaings/delete_campaing.php",
  		data: {
  			id: campaing_id
  		},
  		error: function(xhr, str) {
  			alert('Возникла ошибка: ' + xhr.responseCode);
  		}
  	}).done(function (data) {
  		if (data == "deleted") {
  			window.location.reload();
  		}else {
  			$.prompt("Не удалось удалить кампанию, возможно она уже была удалена");
  		}
  		
  	});
  }

  function test_send(camp_id,email) {
    $.ajax({
      type: "POST",
      url: "handlers/campaings/test_mail.php",
      data: {id:camp_id,email:email},
      error: function (xhr, str) {
        alert('Проверьте \"'+email+'\"' );
        alert(str);
      }
    }).done(function (result){
        if (result == "sent") {
           var n = noty({
              text: 'Has been sent successfully.Check '+email,
              type: 'success',
              layout: 'topCenter'
           });
        } else if (result == 'mailererror') {
          var n = noty({
              text: 'Not sent: '+result,
              type: 'error',
              layout: 'topCenter'
           });
        } else {
          var n = noty({
              text:    result,
              type:   'error',
              layout: 'topCenter'
           });
        }
    });
  }