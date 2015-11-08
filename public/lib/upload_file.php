<?php 
	session_start();
	if(!isset($_SESSION['uid'])) {
		// TODO: proper error page
		header('Location: '. '../index.php');
		die("Not authenticated");
	}
	include_once("Connection.php");
	// session_start();

	if(isset($_FILES['upfile'])) {
		if($_FILES['upfile']['error'] == 0) {

			$name = $_FILES['upfile']['name'];
			$type = $_FILES['upfile']['type'];
			$content = file_get_contents($_FILES['upfile']['tmp_name']);

			$c = Connection::Instance();
			$sql = "INSERT INTO File (name, type, created, modified, content) VALUES (?, ?, NOW(), NOW(), ?);";
			try {
				$stmt = $c->connection->prepare($sql);
				$stmt->execute(array($name, $type, $content));

				$rows = $stmt->rowCount();
				if($rows > 0) {
					// $_SESSION["file_status"] = "File upload succeeded";
				}
			}
			catch(Exception $ex) {
				error_log($ex->getMessage());
				// $_SESSION["file_status"] = "File upload failed";
			}
		}
	}
	header('Location: '. '../index.php');
?>