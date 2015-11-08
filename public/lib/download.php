<?php 
	session_start();
	if(!isset($_SESSION['uid'])) {
		// TODO: proper error page
		header('Location: '. '../index.php');
		die("Not authenticated");
	}
	include_once("Connection.php");

	if(isset($_POST['id'])) {
		$c = Connection::Instance();
		$id = $_POST['id'];
		$sql = sprintf("SELECT _id, name, type, content FROM File WHERE _id = %s;", $id);
		try {
			$statment = $c->connection->query($sql);
			if($statment != false) {
				$results = $statment->fetchAll(PDO::FETCH_ASSOC);
				$name = $results[0]['name'];
				$type = $results[0]['type'];
				$content = $results[0]['content'];
				header("Content-Disposition: attachment; filename=\"$name\"");
		        header("Content-type: $type");
		        // header("Content-length: $size");
		        print $content;
			}
		}
		catch(Exception $ex) {
			echo json_encode("Something went wrong");
		}
	}
?>