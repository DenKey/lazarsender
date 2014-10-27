function delete_email(id) {
	$.ajax({
		type: "POST",
		url: "handlers/emails/delete_email.php",
		data: {
			eid: id
		}
	}).done(function (){
		window.location.reload();
	});
}