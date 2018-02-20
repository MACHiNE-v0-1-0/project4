<?php
namespace App\Libs;

class Database {
	private $conn;
	public function __construct(){
	 	try {
	 		$this->conn = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME."", DB_USER, DB_PASS);
	 		$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			$this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
	 	} catch(\PDOException $err){
	 		$this->conn = null;
	 		echo $err->getMessage();
	 	}
	}

	public function getConn(){
		if($this->conn !== null){
			return $this->conn;
		} else {
			echo "<br>Can't conenct to the database";
			return false;
		}
	}
}