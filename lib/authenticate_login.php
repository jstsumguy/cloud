<?php
	include_once("../gb_conf.php");
	include_once("Authenticator.php");

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	if(is_ajax()) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		if(isset($username) && isset($password)) {
			$results = Authenticator::authenticate($username, $password);
			echo $results;
		}
	}

?>