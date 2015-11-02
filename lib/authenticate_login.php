<?php
	include_once("../gb_conf.php");

	function is_ajax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}

	if(is_ajax()) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		echo json_encode();
	}

?>