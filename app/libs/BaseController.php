<?php 
namespace App\Libs;


class BaseController {
	protected $className = null;
	protected $model;
	protected $view;

	public function __construct(){
		
		$this->className = get_class($this);
		
		$nameModel = \explode("\\",$this->className);
		$nameModel = $nameModel[2];	// e.g : Index
		$this->view = new View($nameModel);
		$nameModel = $nameModel . "Model";	//e.g : IndexModel


		
		$pathModel = "app/Models/". $nameModel .".php";


		if(file_exists($pathModel)){
			require_once $pathModel;
			$nameModel = "App\\Models\\" . $nameModel;

			$this->model = new $nameModel();
			
			
		} else {
			echo "<br>dont' have that " .$nameModel ." model ";
			$this->model = null;
			
		}
		
		$this->loadShoppingCart();
	}

	public function loadShoppingCart() {
		if(Session::peek('cart') === false){
			Session::set('cart', array());
		} 
	}

	

}