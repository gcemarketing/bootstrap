function sendEmail() {
	
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var dataString = 'name=' + name + '&email=' + email;
	
	$.ajax({
		type: "POST",
		url: "sendEmail.php",
		data: dataString,
		cache: false,
	})

}