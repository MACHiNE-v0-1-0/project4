<?php
namespace App\Models;

use App\Libs\BaseModel;

class ProductModel extends BaseModel {
	public function __construct(){
		parent::__construct();
	}

	public function delProcess($id) {
		
	}

	public function getProduct($idProduct){
		$result = null;
		$query = "SELECT 
					`products`.product_id as id,
					`name`, 
					`available`, 
					`cpu`, 
					`ram`, 
					`hdd`, 
					`monitor`, 
					`vga`,   
					`guaranty`,
					`price`, 
					`rateSale`, 
					`soldDate`, 
					`numSold`, 
					`avatar`
				  FROM `products`
				  WHERE `products`.product_id = :id";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(":id", $idProduct);

		try {
			if($stmt->execute()){
				$result = $stmt->fetch(\PDO::FETCH_OBJ);
				//return $result; // return an object
				
			} else {
				throw new \PDOException("Error Processing Request", 1);
				
			}
		} catch(\PDOException $err){
			echo $err->getMessage();
		}

		$result->imgs = array();

		$query2 = "SELECT `img`
				  FROM `product_img`
				  INNER JOIN `products` ON `products`.product_id = `product_img`.product_id 
				  WHERE `products`.product_id = :id";

			$stmt2 = $this->db->prepare($query2);
			$stmt2->bindValue(':id', $idProduct);

		try {
			if($stmt2->execute()){
				$imgs = array();
				while($row = $stmt2->fetch(\PDO::FETCH_ASSOC)){
					$imgs[] = $row['img'];
				}	
				$result->imgs = $imgs;
				return $result;
			} else {
				throw new \PDOException("Error Processing Request", 1);
				
			}
		} catch(\PDOException $err){
			echo $err->getMessage();
		}
	}
//
	public function numAllProduct(){
		$query = "SELECT COUNT(`product_id`) as num
				  FROM `products`";

		$stmt = $this->db->prepare($query);

		try {
			if($stmt->execute()){
				$result = $stmt->fetch(\PDO::FETCH_ASSOC);
				return $result['num'];
			} else {
				throw new Exception("<br>can't get num of all record");
				
			}
		} catch(Exception $err) {
			echo $err->getMessage();
		}
	}

//
	public function getHotProducts($page) {
		$start = ($page - 1) * 4;
		$limit = 4;
		

		$query = "SELECT * 
				  FROM `products`
				  ORDER BY `numSold` DESC, `soldDate` DESC
				  LIMIT :start, :quantity";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':start', $start);
		$stmt->bindValue(':quantity', $limit);

		try {
			if($stmt->execute()){
				$ketqua = null;
				while($result = $stmt->fetch(\PDO::FETCH_ASSOC)){
					$ketqua[] = $result;
				}
				
				foreach ($ketqua as  &$value) {
					if($value['avatar'] === null) {
						$value['avatar'] = 'no-img.png';
					}
				}
				
				return $ketqua;
			} else {
				throw new PDOException('can\'t get hot product ');
				
			}
		} catch(PDOException $err) {
			echo $err->getMessage();
		}	
	}

// saving data to database
	public function insertProduct($data) {
		$fieldName = array('name', 'cpu', 'ram', 'hdd', 'monitor', 'vga', 'guaranty', 'price', 'rateSale', 'soldDate','numSold', 'avatar');
		
		$insertQuery = "INSERT INTO  `products`
				(`name`, `cpu`, `ram`, `hdd`, `monitor`, `vga`, `guaranty`, `price`, `rateSale`, `soldDate`, `numSold`, `avatar`)
				  VALUES (:name, :cpu, :ram, :hdd, :monitor, :vga, :guaranty, :price, :rateSale, :soldDate, :numSold, :avatar)";

	//set name of avatar is unique like name of product
		$srcAvatar = $data['product-img'];
		if($data['product-img'] !== null) {
			$productName = $data['product-name'];
			$productImgType = explode("/", $data['product-img']['type'])[1];
			
			$data['product-img'] = $data['product-name']. ".".$productImgType;
		// upload avatar to server
			$targetDir = ROOT. "app/Models/productsImg/" . $data['product-img'];

			$tempDir = $srcAvatar['tmp_name'];

			if(move_uploaded_file($tempDir, $targetDir)) {
				echo "upload thanh cong avatar";
			} else {
				echo "upload that bai avatar";
				$data['product-img'] = 'no-img.png';
			}
		}
	// combine 2 two arrays that one values of array is key and the other is value of result array;
		$input = array_combine($fieldName, $data); 

		$stmt = $this->db->prepare($insertQuery);

		// bind value to prepare statement
		foreach ($input as $key => $value) {
			$stmt->bindValue(":$key", $value);
		}

		try {
			if($stmt->execute()){
				echo "<br>sucesfully adding product ";
				header("Location:". DOMAIN);
			} else {
				echo "<br>failed to add product ";
				throw new \PDOException("<br>err  execute sql");
			}
		} catch (\PDOException $err) {
			echo "here";
			$err->getMessage();
		}
		
	}
	
	public function isAvatarExists($name) {
		$query = "SELECT count(`product_id`) as num
				  FROM `products`
				  WHERE avatar = :name";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':name', $name);

		try{
			if($stmt->execute()){
				$result = $stmt->fetch(\PDO::FETCH_ASSOC);
				$data = $result['num'];

				if($data === 1) {
					return true;
				} else {
					return false;
				}
			} else {
				throw new \PDOException("<br>query execute is failed");
			}
		} catch(PDOException $err){
			echo $err->getMessage();
		}
	}
} // end class