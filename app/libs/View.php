<?php
namespace App\Libs;


class View {

	public function __construct(){
		
	}

	public function render($viewName = null, $data = null){
		include_once "public/layout/header.php";
		
		if($viewName !== null) 
			include_once "app/Views/". $viewName. ".php";

		include_once "public/layout/footer.php";
	}

	public function loadDefaultCss(){
		$cssPath = "./public/css";
		$cssFileNames = scandir($cssPath);
		$cssFileNames = array_slice($cssFileNames, 2);

		foreach ($cssFileNames as $key => $value) {
			echo "<link href=".DOMAIN."public/css/".$value." type='text/css' rel='stylesheet'>";
		}
	}

	public function loadDefaultJs(){
		$jsPath = "./public/js/";
		$jsFileNames = scandir($jsPath);
		$jsFileNames = array_slice($jsFileNames, 2);
		
		foreach ($jsFileNames as $key => $value) {
			echo "<script src=".DOMAIN."public/js/".$value." rel='stylesheet' type='text/javascript'></script>";
		}
	}
}