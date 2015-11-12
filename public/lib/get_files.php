<?php 
	session_start();
	if(!isset($_SESSION['uid'])) {
		// TODO: proper error page
		header('Location: '. '../index.php');
		die("Not authenticated");
	}
	include_once("Connection.php");

	$c = Connection::Instance();
	$sql = "SELECT _id, name, type, created FROM File ORDER BY created;";
	try {
		$statment = $c->connection->query($sql);
		if($statment != false) {
			$results = $statment->fetchAll(PDO::FETCH_ASSOC);
			echo json_encode($results);
		}
	}
	catch(Exception $ex) {
		echo json_encode("Something went wrong");
	}
?>