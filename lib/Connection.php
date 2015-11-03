<?php

	include_once("../gb_conf.php");

	class Connection {

		public static function Instance() {
		    static $inst = null;
		    if ($inst === null) {
		        $inst = new Connection();
		    }
		    return $inst;
		}

		private function __construct() {
			$dns = sprintf("mysql:host=%s;dbname=%s;charset=utf8;", HOST, DB);
			$this->connection = new PDO($dns, USER, PASSWORD);
			if($this->connection != false) {
				error_log("Connection established");
			}
		}

		function close() {
			if(isset($this->connection)) {
				$this->connection->close();
			}
		}

	}

?>