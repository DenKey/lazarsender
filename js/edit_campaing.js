tinymce.init({
				selector: "#editor",
		        plugins: [
		                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
		                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
		                "table contextmenu directionality emoticons template textcolor paste textcolor colorpicker textpattern"
		        ],

		        toolbar1: "fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
		        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
		        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

		        menubar: false,
		        toolbar_items_size: 'small',

		        style_formats: [
		                {title: 'Bold text', inline: 'b'},
		                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
		                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
		                {title: 'Example 1', inline: 'span', classes: 'example1'},
		                {title: 'Example 2', inline: 'span', classes: 'example2'},
		                {title: 'Table styles'},
		                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		        ],

		        templates: [
		                {title: 'Test template 1', content: 'Test 1'},
		                {title: 'Test template 2', content: 'Test 2'}
		        ],
		        height: 300,
				cleanup: true,
				language: 'ru'
			});


var campaing_id = getVar('id');

	$.ajax({
		type: "POST",
		url: "handlers/campaings/select_campaing.php",
		data: {
			id: campaing_id
		},
		error: function(xhr, str) {
			alert('Возникла ошибка: ' + xhr.responseCode);
		}
	}).done(function(result) {

		if (result == 'notfill') {
			$.prompt("Выбранная кампания не найдена.Вы будете возвращены к списку кампаний", {
				title: "Неверный ID кампании",
				buttons: {
					"Вернуться к списку": true
				},
				submit: function(e, v, m, f) {
					if (v) {
						window.location = "campaings.php";
					}
				}
			});
		} else {
			var obj_from_json = JSON.parse(result);

			var str = obj_from_json.html_str.toString();

//			var groups = JSON.parse(obj_from_json.groups);
//			
			// выделим все группы из БД
//			if (typeof groups == "object") {
//				for (var i=0;i<groups.length;i++) {
//					$('#select option[value=' +groups[i]+ ']').attr('selected', 'selected');
//				};	
//			};
			
			$("[name|='name']").val(obj_from_json.name);
			$("[name|='subject']").val(obj_from_json.subject);


			tinymce.activeEditor.selection.setContent(str);
		};

	});


// Thanks http://scripts.franciscocharrua.com/javascript-get-variables.php
function getVar(name)
         {
         get_string = document.location.search;         
         return_value = '';
         
         do { //This loop is made to catch all instances of any get variable.
            name_index = get_string.indexOf(name + '=');
            
            if(name_index != -1)
              {
              get_string = get_string.substr(name_index + name.length + 1, get_string.length - name_index);
              
              end_of_value = get_string.indexOf('&');
              if(end_of_value != -1)                
                value = get_string.substr(0, end_of_value);                
              else                
                value = get_string;                
                
              if(return_value == '' || value == '')
                 return_value += value;
              else
                 return_value += ', ' + value;
              }
            } while(name_index != -1)
            
         //Restores all the blank spaces.
         space = return_value.indexOf('+');
         while(space != -1)
              { 
              return_value = return_value.substr(0, space) + ' ' + 
              return_value.substr(space + 1, return_value.length);
							 
              space = return_value.indexOf('+');
              }
          
         return(return_value);        
         }
///////////

function edit_campaing() {
	var campaing_id =  getVar('id');
	var html        =  tinymce.activeEditor.getContent();

	var campaing_name        =  $("[name|='name']").val();
	var campaing_subject     =  $("[name|='subject']").val();
//	var campaing_select      =  $("#select").val();

 	$.ajax({
 		type: "POST",
 		url: "handlers/campaings/edit_campaing.php",
 		data: {
 			id:     campaing_id,
 			name:   campaing_name,
 			subject:campaing_subject 
 		},
 		error: function(xhr, str) {
 			alert('Возникла ошибка: ' + xhr.responseCode);
 		}
 	}).done(function (result) {

 		var obj = JSON.parse(result);

 		if (obj.status == 1) {
 			add_html(html,obj.id);
 			$.prompt("Кампания сохранена",{
 				buttons:{"Хорошо":true},
 				submit: function(e, v, m, f) {
 					window.location = "/campaings.php";
 				}
 			});
 		} else if (obj.status == 0) {
 			$.prompt("Кампании с таким именем не существует");
 		} else if (obj.status == -1){
 			$.prompt("Заполните все поля и попробуйте снова");
 		} else {
 			$.prompt("Ошибка JQuery");
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
