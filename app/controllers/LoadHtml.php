<?php 

namespace App\Controllers;

use App\Libs\BaseController;

class LoadHtml extends BaseController {
	public function __construct(){
		parent::__construct();
	}

	public function loadCartCheckOut() {
		include_once ROOT . 'app/Views/Cart/cart-check-out.php';
		
	}

}