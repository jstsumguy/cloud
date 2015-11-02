<?php

	include_once("../gb_conf.php");

	class Connection {

		public static function Instance() {
		    static $inst = null;
		    if ($inst === null) {
		        $inst = new Connection($HOST, $USER, $PASSWORD, $DB);
		    }
		    return $inst;
		}

		private function __construct($host, $user, $password, $db) {
			$con = new mysqli($host, $user, $password, $db);
			if(is_null($con) || $con == undefined) {
				throw new Error("Could not establish connection");
			}
			$this->connection = $con;
		}

		function close() {
			if(isset($this->connection)) {
				$this->connection->close();
			}
		}

	}

?>