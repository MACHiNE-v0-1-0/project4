<?php
namespace App\Libs;

class Session {
	
	public static function init(){
		@session_start();
	}

	public static function set($key, $value)
	{
		$_SESSION[$key] = $value;
		
	}

	public static function get($key)
	{
		if(isset($_SESSION[$key])){
			return $_SESSION[$key];
		} else {
			echo "<br> WARNING!! there's no SESSION[$key] !!";
			return null;
		}
	}

	public static function peek($key) {
		if(isset($_SESSION[$key]) && !empty($_SESSION[$key])){
			return true;
		} else {
			return false;
		}
	}

	public static function hasExistValue($key, $value){
		if(in_array($value, $_SESSION[$key]) )
			return true;
		else
			return false;
	}
	
	public static function addMoreToKey($key, $value){
		$_SESSION[$key][] = $value;
		return true;
	}

	public function addAssoc($key){

	}

	public static function del($key){
		if(Session::peek($key)){
			unset($_SESSION[$key]);
			return true;
		} else {
			echo "<br> session with $key is not valid";
			return false;
		}
	}
}