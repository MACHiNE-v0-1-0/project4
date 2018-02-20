<?php
namespace App\Controllers;

use App\Libs\Authorization;
use App\Libs\Session;

use App\Libs\BaseController;


class Index extends BaseController
{
	public function __construct(){
		parent::__construct();
	}

	public function index() {
		$data = array();
		
		$hotProduct = $this->model->getHotProducts();
		$trendingProduct = $this->model->getTrendingProducts();
			
		$data["hotProducts"] = $hotProduct;
		$data["trendingProducts"] = $trendingProduct;

		

		$this->view->render("Index/main", $data);
	
	}

	
	public function show(){}
	public function test(){
		//include  ROOT.'app/Views/test.php';
	}
}