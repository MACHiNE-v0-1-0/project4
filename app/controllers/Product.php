<?php 
namespace App\Controllers;

use App\Libs\BaseController;
use App\Libs\Pagination;
use App\Libs\Authorization;

class Product extends BaseController {
	public function __construct(){
		parent::__construct();
	}

	public function index() {
		echo "<br>Index product";
	}

	public function del() {
		$id = null;
		if(isset($_POST['id']) && !empty($_POST['id'])){
			$id = $_POST['id'];
		}

		if($id === null) { return false; }

		$this->model->delProcess($id);
	}

	public function showDetail(){
		$idProduct = null;
		$data = array();
		
		if(isset($_POST['idProduct']) && !empty($_POST['idProduct'])) {
			$idProduct = (int)$_POST['idProduct'];
		} else{
			echo "ajax false";
			return false;
		}
		
		$returnData = $this->model->getProduct($idProduct);

	//check if any value is not utf 8 then encoded that with utf8_encode 
		// make that value can be json_encoded properly
		foreach ($returnData as $key => &$value) {
			if(is_string($value)){
				$value = utf8_encode($value);
			}
		}
		
		if(json_encode($returnData) === false ) {
			echo "can't encode the data";
			echo json_last_error_msg();
		} else {
			echo json_encode($returnData);
		}
	}
// 
	public function showHot($page = 1){
		$data = array();

		if(is_array($page)){
			$page = (int)$page[0];
		} 
		
		$data["hotProduct"] = $this->model->getHotProducts($page);
		
		$numPost = $this->model->numAllProduct();
		$pagination = new Pagination($numPost, $page); // it will instantiate an object of pagination class; 	
		$pagination->setPostPerPage(4);
		$pagination->setNumLink(1);
		$data['pagination'] = $pagination;
		
		$this->view->render("Product/showHotProduct", $data);
	}

// posting product to database
	public function posting() {

		if(!Authorization::isAdmin()){
			header("Location:".DOMAIN);
		}

		$data = array();

		$data['product-name'] = $_POST["post-product-name"];
		$data['product-cpu'] = $_POST['post-product-cpu'];
		$data["product-ram"] = $_POST['post-product-ram'];
		$data["product-hdd"] = $_POST['post-product-hdd'];
		$data["product-monitor"] = $_POST['post-product-monitor'];
		$data["product-vga"] = $_POST['post-product-vga'];
		$data['product-guaranty'] = $_POST['post-product-guaranty'];
		$data['product-price'] = $_POST['post-product-price'];
		$data['product-ratesale'] = $_POST['post-product-ratesale'];
		$data['product-solddate'] = $_POST['post-product-solddate'];
		$data['product-numSold'] = rand(10, 100);
		$data['product-img'] = $_FILES['post-product-img'];

		if($data['product-img']['error'] === 4) {
			$data['product-img'] = null;
		}
		
		$this->model->insertProduct($data);
	}
// load posting form 
	public function post(){
		$this->view->render('Product/postingProduct');
	}
// update img for each product 
	public function update(){

	}
}