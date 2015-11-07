<?php
	session_start();
?>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="./static/css/normalize.css">
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="./static/css/base.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="side-bar">
		<ul>
			<?php
				if(isset($_SESSION['uid'])) {
				echo '<li id="show-upload" class="list-icon">Upload</li>
					<li id="files" class="list-icon">Files</li>
					<li id="photos" class="list-icon">Photos</li>
					<li id="music" class="list-icon">Music</li>'; 
				} 
			?>
		</ul>	
	</div>

	<div class="main">
		<?php
			if(isset($_SESSION['uid'])) {
				echo '<form id="upload-form" action="./lib/upload_file.php" method="post" enctype="multipart/form-data">
							<h2>Upload Files</h2>
							<input type="file" name="upfile" id="file">
							<button id="upload-btn" type="submit">Upload</button>
					</form>

					<div id="download-modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Download File</h4>
								</div>
								<div class="modal-body">
									<form id="download-form" action="./lib/download.php" method="post">
											<h2>Are you sure you want to download?</h2>
											<input type="hidden" id="download_id" name="id">
											<button id="download-btn" type="submit">Download</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->

					<div id="delete-modal" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									<h4 class="modal-title">Delete File</h4>
								</div>
								<div class="modal-body">
									<form id="delete-form" action="./lib/delete_file.php" method="post">
											<h2>Are you sure you want to delete?</h2>
											<input type="hidden" id="delete" name="id">
											<button type="submit">Delete</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->';
			}
			else {
				echo '<form id="login-form" onbsubmit="return false;" autocomplete="off">
						<div class="input-group">
							<div class="input-control"><input autocomplete="off" type="text" placeholder="Username" name="username" id="username" /></div>
							<div class="input-control"><input autocomplete="off" type="password" placeholder="Password" name="password" id="password" /></div>
							<button id="login-btn" type="button">Login</button>
						</div>
					</form>';
			}
		?>
		<table class="table table-hover" style="display: none;">
			<thead>
				<th>Name</th>
				<th>Type</th>
				<th>Created</th>
				<tbody id="file-container">
				</tbody>
			</thead>
		</table>
	</div>
</div>
</body>
<script type="text/javascript" src="./static/js/index.js"></script>
</html>