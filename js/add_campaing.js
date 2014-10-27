function add() {
	var html = tinymce.activeEditor.getContent();
 	var msg = $('#add_campaing').serialize();
 	$.ajax({
 		type: "POST",
 		url: "handlers/campaings/add_campaing.php",
 		data: msg,
 		error: function(xhr, str) {
 			alert('Возникла ошибка: ' + xhr.responseCode);
 		}
 	}).done(function (data) {
 		var array = JSON.parse(data);
 		if (array['status'] == 1) {
 			add_html(html,array['id']);
 			$.prompt("Кампания создана",{
 				buttons:{"Хорошо":true},
 				submit: function(e, v, m, f) {
 					window.location = "/campaings.php";
 				}
 			});
 		} else if (array['status'] == 0) {
 			$.prompt("Кампания с таким именем уже существует");
 		} else if (array['status'] == -1){
 			$.prompt("Заполните все поля");
 		}
 	});
 }

 function add_html(html,camp_id){
 	$.ajax({
 		type: "POST",
 		url: "handlers/campaings/add_letter.php",
 		data: {html_str: html,id: camp_id},
 		error: function(xhr, str) {
 			alert('Возникла ошибка: ' + xhr.responseCode);
 		}
 	}).done(function (result){

 	});
 }

   