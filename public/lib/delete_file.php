<?php 
	include_once("Connection.php");

	if(isset($_POST['id'])) {
		$c = Connection::Instance();
		$id = $_POST['id'];
		$sql = sprintf("DELETE FROM File WHERE _id = %s;", $id);
		try {
			$statment = $c->connection->query($sql);
			if($statment != false) {
				$count = $statment->rowCount();
				if(!$count) {
					error_log("Something went wrong");
				}
			}
		}
		catch(Exception $ex) {
			echo json_encode("Something went wrong");
		}
	}
	header('Location: '. '../index.php');
?>