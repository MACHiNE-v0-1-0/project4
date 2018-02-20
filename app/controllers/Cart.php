<?php 
namespace App\Controllers;

use App\Libs\Session;
use App\Libs\BaseController;
use App\Libs\Authorization;

class Cart extends BaseController {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$cart = Session::get('cart');
		if(count($cart) === 0 ) {
			$data['product'] = "You haven't selected any product";
			$this->view->render('Cart/index', $data);
			return false;
		}

		$data['product'] = $this->model->getCart($cart);
		var_dump($data['product']);
		
		
		$this->view->render('Cart/index', $data);
	}

	public function change() {
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];

		
		$cart = Session::get('cart');

		foreach ($cart as $key => &$product) {
			if($product['id'] == $id) {
				$_SESSION['cart'][$key]['quantity'] = $quantity;
				echo "change successfully";
				return true;
			} 
		}
		echo "false ";
	}


	public function add() {

		$id = null;
		$numQuantity = null;

		if(isset($_POST['id'])) {
			$id = (int) $_POST['id'];
		}

		if(isset($_POST['numQuantity'])) {
			$numQuantity = (int) $_POST['numQuantity'];
		}

		

		if($id === null || $numQuantity === null){
			echo "failed";
			return false;
		} 
			
		$data = array();
		$data['id'] = $id;
		$data['quantity'] = $numQuantity;

		// check if cart has that id
		$cart = Session::get('cart');
		foreach ($cart as $value) {
			if($value['id'] === $data['id']){
				echo "Product has already in your cart";
				return false;
			} 
		}

		Session::addMoreToKey('cart', $data);
		echo "added";
		return true;

	} //end method

	public function loadCart(){
		$data = array();

		$idProducts = Session::get('cart');
		
		//get products from cart model //
		$data['products'] = $this->model->getCartProduct($idProducts);

		$this->view->render("Cart/index", $data);
		
	} //end method

	
	public function del(){
		if(isset($_POST['id']) && !empty($_POST['id'])) {
			$id = $_POST['id'];
		} else {
			echo "Can't find that id product";
			return false;
		}

		$cart = Session::get('cart');

		foreach ($cart as $key => $value) {
			if($value['id'] == $id){
				unset($_SESSION['cart'][$key]);
				echo "Deleted";
				$laterCart = Session::get('cart');
				if(count($laterCart) === 0 ) {
					return false;
				}
				return true;
			}
		}
	}  //end method
//	
	public function delAll() {
		unset($_SESSION['cart']);
		echo "YOur cart is delete";
	}
// 
	public function checkOut() {
		$req = array();
		if(!isset($_POST['check-out-form-submit']) || empty($_POST['check-out-form-submit'])) 
			header('Location:'.DOMAIN);

	//get user id
		$req['user_id']  = Session::get('user')['id'];
	//get infos abouts order 
		$req['name'] = $_POST['check-out-form-name'];
		$req['phone'] = $_POST['check-out-form-phone'];
		$req['email'] = $_POST['check-out-form-email'];
		$req['address'] = $_POST['check-out-form-address'];
		$req['note'] = $_POST['check-out-form-note'];
	// if check out form note is empty then set it to null
		if(strlen($_POST['check-out-form-note']) === 0 ) {
			$req['note'] = null;
		}
	//get cart  
		$cart = Session::get('cart');
		$req['cart'] = $cart;

		$this->model->checkOutProcess($req);


	}
// 
	public function checkOutHistory(){
		if(!Authorization::isLogin()) header("location:".DOMAIN."User/login");
		$user = Session::get('user')['id'];

		$this->model->checkOutHistoryModel($user);
	}
} 