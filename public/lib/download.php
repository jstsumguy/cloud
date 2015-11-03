<?php 
	include_once("Connection.php");

	// if(isset($_POST['id'])) {
	// 	$c = Connection::Instance();
	// 	$sql = sprintf("SELECT _id, name, type, content FROM File WHERE _id = %s;", $id);
	// 	try {
	// 		$statment = $c->connection->query($sql);
	// 		if($statment != false) {
	// 			$results = $statment->fetchAll(PDO::FETCH_ASSOC);
	// 			echo json_encode($results);
	// 		}
	// 	}
	// 	catch(Exception $ex) {
	// 		echo json_encode("Something went wrong");
	// 	}
	// }
?>