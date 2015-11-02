$(document).ready(function() {
	$('#login-btn').on('click', function() {
		username = $('#username').val();
		password = $('#password').val();
		console.log(username);
		data = {};
		data['username'] = username;
		data['password'] = password;
		console.log(JSON.stringify(data));
		$.ajax({
			url: '../lib/authenticate_login.php',
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(response) {
				console.log("success");
				console.log(response);
			}
		})
	})
})