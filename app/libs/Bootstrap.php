<?php 
namespace App\Libs;

class Bootstrap {
	
	private $controller;
	private $action;
	private $params;

	private $numUrl = null;
	private $url = null;

	public function __construct(){
		
		Session::init();
		$this->getUrl();
		$this->splitUrl();
		$this->setMVC();
		$this->callMVC();
	
	}

	public function getUrl(){
		if(isset($_GET["url"])){
			$this->url = $_GET["url"];
			$this->url = rtrim($this->url, "/");
		} else {
			$this->url = "Index";
		}
	}

	public function splitUrl(){
		$this->url = explode("/", $this->url);
	}

	public function setMVC(){
		$numOfUrl = count($this->url);

		$this->numUrl = $numOfUrl;
		switch ($numOfUrl ) {
			case 1:
				$this->controller = $this->url[0];
				$this->action = "index";
				break;
			case 2:
				$this->controller = $this->url[0];
				$this->action = $this->url[1];
				break;
			default:
				$this->controller = $this->url[0];
				$this->action = $this->url[1];
				$this->params = array_slice($this->url, 2);
				break;
		}
	}

	public function callMVC(){
		switch ($this->numUrl) {
			case 1:
			case 2:
				$nameClass ="App\\Controllers\\". $this->controller;
				$app = new $nameClass();
				$app->{$this->action}();				
				break;
			default:
				$nameClass ="App\\Controllers\\". $this->controller;
				$app = new $nameClass();
				$app->{$this->action}($this->params);
				break;
		}
	}
	



}