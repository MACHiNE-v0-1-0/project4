<?php 
	require_once __DIR__ . '/vendor/autoload.php';
	


	require_once "app/Configs/database.php";
	require_once "app/Configs/default.php";
	require_once "app/Configs/path.php";
	

	use App\Libs\Bootstrap;
	
		

	// VERY IMPORTANT MAKE SESSION WORK CORECTLY WITH DOMAIN
	//session_set_cookie_params(0, '/', '.' . DOMAIN); 
			


	

	
	
	$app = new Bootstrap();
	