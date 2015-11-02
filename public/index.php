<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="../static/css/normalize.css">
<link rel="stylesheet" type="text/css" href="../static/css/base.css">
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>

<div class="container">
	<div class="side-bar">
		<ul>
			<li class="list-icon">Files</li>
			<li class="list-icon">Photos</li>
			<li class="list-icon">Music</li>
		</ul>	
	</div>

	<div class="main">
		<?php

		$uid = $_SESSION['uid'] || null;
		if( $uid != null) {
		
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
	</div>
</div>
</body>
<script type="text/javascript" src="../static/js/index.js"></script>
</html>