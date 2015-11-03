$(document).ready(function() {

	$('.list-icon').on('click', function() {
		siblings = $(this).siblings().css('left', '0px');
		$(this).animate({
			left: '70px',
		}, 900);
	})

	$('#login-btn').on('click', function() {
		username = $('#username').val();
		password = $('#password').val();
		data = {};
		data['username'] = username;
		data['password'] = password;
		$.ajax({
			url: '../lib/authenticate_login.php',
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(response) {
				data = JSON.parse(response);
				if(data.indexOf("fail") > -1) {
					console.log("something went wrong");
				}
				else {
					window.location.reload(true);
				}
			}
		})
	});

	$('#files').on('click', function() {
		$('#upload-form').css('display', 'none');
		$.ajax({
			url: '../lib/get_files.php',
			type: 'get',
			success: function(response) {
				data = JSON.parse(response);
				$('#file-container').empty();
				for(i=0; i < data.length; i++) {
					$('#file-container').append('<tr class="file-item">' +
						'<td>' + data[i]['name'] + '</td>' +
						'<td>' + data[i]['type'] + '</td>' +
						'<td>' + data[i]['created'] + '</td>'
						+ '<td><button id="' + data[i]['_id'] + '" class="download-btn">Download</button></td>'
					+ '</tr>');
				}
				$('table').css('display', 'block');
			}
		})
	});

	$('.download-btn').on('click', function() {
		console.log('clicked');
		$('download-modal').modal('toggle');
	})

	$('#show-upload').on('click', function() {
		$('table').css('display', 'none');
		$('#upload-form').fadeIn();
	});
});