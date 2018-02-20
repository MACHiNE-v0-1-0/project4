<?php 
namespace App\Libs;

use App\Libs\Session;

class Authorization {
	public static function isLogin(){
		if(Session::peek("user")) {
			return true;
		} else {
			return false;
		}
	}

	public static function isAdmin() {

		if(!static::isLogin()) {
			
			return false;
		}
		
		if(Session::get('user')['level'] === 'admin'){
			return true;
		} else {
			return false;
		}
	}
}