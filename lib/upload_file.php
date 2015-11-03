<?php 
	include_once("Connection.php");

	if(isset($_FILES['upfile'])) {
		if($_FILES['upfile']['error'] == 0) {

			$name = $_FILES['upfile']['name'];
			$type = $_FILES['upfile']['type'];
			$content = file_get_contents($_FILES['upfile']['tmp_name']);

			$c = Connection::Instance();
			$sql = "INSERT INTO File (name, type, created, modified, content) VALUES ('$name', '$type', NOW(), NOW(), '$content');";
			try {
				$rows = $c->connection->exec($sql);
				if($rows > 0) {
					// $_SESSION["file_status"] = "File upload succeeded";
				}
			}
			catch(Exception $ex) {
				error_log($ex);
				// $_SESSION["file_status"] = "File upload failed";
			}
		}
	}
	header('Location: '. '../public/index.php');
?>