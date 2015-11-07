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
			url: './lib/authenticate_login.php',
			type: 'post',
			dataType: 'json',
			data: data,
			success: function(response) {
				data = JSON.parse(response);
				window.location.reload(true);
			}
		})
	});

	$('#files').on('click', function() {
		$('#upload-form').css('display', 'none');
		$.ajax({
			url: './lib/get_files.php',
			type: 'get',
			success: function(response) {
				data = JSON.parse(response);
				console.log(data);
				$('#file-container').empty();
				for(i=0; i < data.length; i++) {
					$('#file-container').append('<tr class="file-item" id="' + data[i]['_id'] + '">' +
						'<td>' + data[i]['name'].slice(0, data[i]['name'].indexOf('.')) + '</td>' +
						'<td>' + data[i]['type'] + '</td>' +
						'<td>' + data[i]['created'] + '</td>'
						+ '<td><button class="delete-button" id="' + data[i]['_id'] + '">' + 'Delete</button></td>'
					+ '</tr>');
				}
				$('table').css('display', 'block');
			}
		})
	});

	$( "table" ).on('click', 'tbody tr td', function() {
		console.log('clicked');
		id = null;
		if($(this).children()[0] == undefined) {
			id = $(this).parent().attr('id');
			console.log('id ' + id);
			$('#download-modal').modal('toggle');
			$('#download_id').val(id);
		}
		else {
			$('#delete-modal').modal('toggle');
			id = $(this).find('button').attr('id');
			console.log('id ' + id);
			$('#delete-modal').modal('show');
			$('#delete').val(id);
		}
	})

	$('#download-btn').on('click', function() {
		$('#download-modal').modal('toggle');
	})

	$('#show-upload').on('click', function() {
		$('table').css('display', 'none');
		$('#upload-form').fadeIn();
	});
});