<?php
namespace App\Models;

use App\Libs\BaseModel as BaseModel;

class IndexModel extends BaseModel{
	
	public function __construct(){
		parent::__construct();
	}

	public function getNumHotProducts(){
		$query = "SELECT COUNT(`product_id`) as num
				  FROM `products`
				  ";

		$stmt = $this->db->prepare($query);

		try{
			$stmt->execute();
		} catch(PDOException $err){
			echo $err->getMessage();
		}

		$result = $stmt->fetch(\PDO::FETCH_ASSOC);
		$result =(int)$result['num'];

		return $result;
	}

	public function getHotProducts(){
		$data = array();


		$query = "SELECT * 
				  FROM `products`
				  ORDER BY numSold DESC 
		 		  LIMIT 0, 4";

		$stmt = $this->db->prepare($query);

		try {
			$stmt->execute();
			while($result = $stmt->fetch(\PDO::FETCH_ASSOC)){
				$data[] = $result;
			}
		} catch(PDOException $err) {
			echo $err->getMessage();	
		}
		
		foreach ($data as &$product) {
			if($product['avatar'] === null){
				$product['avatar'] = 'no-img.png';
			}
		}
		

		
		

		return $data;

	}

	public function getTrendingProducts(){
		// get current date
		$curDate = date("Y/m/d");
		// then get date of one week before 
		$sevenDaysAgo = date('Y/m/d',strtotime($curDate. '-7 day')); 

		$query = "SELECT * 
				  FROM `products` 
				  WHERE soldDate >= :pastDate AND soldDate <= :curDate 
				  ORDER BY numSold";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':pastDate', $sevenDaysAgo);
		$stmt->bindParam(':curDate', $curDate);

		try {
			$stmt->execute();
		} catch(PDOException $err){
			echo $err->getMessage();	
		}

		$data = array();
		while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
			$data[] = $row;
		}

		return $data;
	}

}