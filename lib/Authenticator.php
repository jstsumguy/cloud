<?php
	include_once("Connection.php");

	class Authenticator {
		static function authenticate($username, $password) {
			$c = Connection::Instance();
			$sql = sprintf("SELECT _id, username, hash FROM User WHERE username = '%s';", $username);

			try {
				$statment = $c->connection->query($sql);
				if($statment != false) {
					$results = $statment->fetchAll(PDO::FETCH_ASSOC);
					return $results;
				}
			}
			catch(Exception $ex) {
				error_log($ex->getMessage());
				return json_encode($ex->getMessage());
			}
		}
	}
?>