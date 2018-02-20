<?php

namespace App\Models;

use App\Libs\BaseModel;
use App\Libs\Session;

class UserModel extends BaseModel {
	public function __construct(){
		parent::__construct();
	}

	public function loggingInProceed($username, $password){
		$query = "SELECT * 
				  FROM `users` 
				  WHERE `username` = :username AND `password` = :password";

		
		
		$stmt = $this->db->prepare($query);

		$stmt->bindParam(":username", $username);
		$stmt->bindParam(":password", $password);

		try {
			$stmt->execute();
		} catch(PDOException $err){
			echo $err->getMessage();		
		}

	
		$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
		if(count($result) === 1){
			Session::set("user", $result[0]);
			return true;
		} else {
			return false;
		}
	}
}