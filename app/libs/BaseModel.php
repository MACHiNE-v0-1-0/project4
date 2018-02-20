<?php 
namespace App\Libs;

class BaseModel {
	protected $db;
	public function __construct(){
		$this->db = new Database();
		$this->db = $this->db->getConn();

	
	}
}