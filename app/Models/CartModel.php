<?php
namespace App\Models;

use App\Libs\BaseModel;
use App\Libs\Session;

class CartModel extends BaseModel{
	public function __construct(){
		parent::__construct();
	}

	public function getCart($cart){
		$data = array();
		$query = "SELECT `product_id`,`name`,`avatar`,`price`,`rateSale`
				  FROM `products`
				  WHERE `product_id` = :num";

		$stmt = $this->db->prepare($query);
		
		foreach ($cart as $product) {
			
			try {
				$stmt->bindValue(":num", $product['id']);
				if($stmt->execute()){
					$result = $stmt->fetch(\PDO::FETCH_ASSOC);
					
					if($result === false) {
						echo "can't get any product";
						return false;
					}
				// bind the quantity 
					$result['quantity'] = $product['quantity'];
											
				// calculate the price after sale rate 
									
					if($result['rateSale'] !== null && $result['rateSale'] !== 0 ){
						$tienPhaiTru = ($result['price'] * $result['rateSale']) / 100;
						$result['price2'] = $result['price'] - $tienPhaiTru;
					}  else {
						$result['price2'] = $result['price'];
					}
				// check if product has avatar or not//
					if($result['avatar'] === null ){
						$result['avatar'] = 'no-img.png';
					}
					$data[] = $result;
				} else {
					throw new PDOException('Can\'t execute query');
					return false;				
				}
			} catch(PDOException $err){
				echo $err->getMessage();
			}
		}

		return $data;
	}

// 
	public function checkOutProcess(array $req){
		$input = $req;
		
		// get current date 
		$curDate = date('Y-m-d');

		$query = "INSERT INTO `orders`
		(`user_id`, `receiver_name`, `receiver_phone`, `receiver_email`,
		`receiver_address`, `receiver_note`, `check_out_date`)
				  VALUES (:user_id, :name, :phone, :email, :address, :note, :check_out_date)";

		$stmt = $this->db->prepare($query);
		$stmt->bindValue(':user_id', $req['user_id']);
		$stmt->bindValue(':name', $req['name']);
		$stmt->bindValue(':phone', $req['phone']);
		$stmt->bindValue(':email', $req['email']);
		$stmt->bindValue(':address', $req['address']);
		$stmt->bindValue(':note', $req['note']);
		$stmt->bindValue(':check_out_date', $curDate);

		try {
			if($stmt->execute() === false ){
				throw new \PDOException("Error ! Can't execute query check out ");
			} else {
				echo "adding order successfully ";
			}
		} catch(\PDOException $err){
			$err->getMessage();
		}

		$orderID = null;

		$userID = $req['user_id'];
		$query2 = "SELECT `order_id`
				   FROM `orders`
				   WHERE `user_id` = :user_id
				   ORDER BY `order_id` DESC";


		$stmt2 = $this->db->prepare($query2);
		$stmt2->bindValue(':user_id', $userID);

		try {
			if($stmt2->execute() === false ){
				throw new \PDOException("Error ! Can't execute query check out ");
			} else {
				echo "get order  id successfully ";
				$orderID = $stmt2->fetch(\PDO::FETCH_ASSOC);
				$orderID = $orderID['order_id'];
			}
		} catch(\PDOException $err){
			$err->getMessage();
		}

		$query3 = "INSERT INTO `order_details`(`order_id`, `product_id`, `product_quantity`)
				   VALUES (:id, :product, :quantity)";
		$stmt3 = $this->db->prepare($query3);

		foreach ($input['cart'] as $value) {
			try {
				$stmt3->bindValue(':id', $orderID);
				$stmt3->bindValue(':product', $value['id']);
				$stmt3->bindValue(':quantity', $value['quantity']);
				if($stmt3->execute() === false) {
					echo "false adding order details";
					throw new \Exception("Err: Can't add order details");
				} else {
					echo "adding order details successfully";
				}
			} catch (\Exception $err){
				$err->getMessage();
				return false;		
			}
		}
		
	}
//
	public function checkOutHistoryModel($user){
		$query = "SELECT order_id
				  FROM `orders`
				  WHERE `orders`.user_id = :user";

		$stmt = $this->db->prepare($query);
		$stmt->bindParam(':user', $user);

		$orderID = array();
		try{
			if($stmt->execute()){
				while($result = $stmt->fetch(\PDO::FETCH_ASSOC)){
					$orderID[] = $result['order_id'];
				}
			} else {
				throw new \PDOException('can\t get order id ');
			}
		} catch(\PDOException $err) {
			$err->getMessage();
		}

		$orderDetails = null;
		$query2 = "SELECT `product_id`, `product_quantity`
				   FROM `order_details`
				   WHERE `order_details`.order_id = :order";

			$stmt2 = $this->db->prepare($query2);
		foreach ($orderID as  $value) {
			$stmt2->bindParam("order", $value);
			$stmt2->execute();
			while($result = $stmt2->fetch(\PDO::FETCH_ASSOC)){
				$orderDetails[] = $result;
			}
		}

		foreach ($orderDetails as  $value) {
			$product = $value['product_id'];
			$quantity = $value['product_quantity'];
			
		}

	}
} // model