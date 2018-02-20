<?php
namespace App\Controllers;

use App\Libs\BaseController;
use App\Libs\Session;
use App\Libs\Authorization;

class User extends BaseController {
	public function __construct(){
		parent::__construct();
	}

	public function isLogin(){
		if(Authorization::isLogin()){
			echo 'logged in';
			return true;
		} else {
			echo  'false';
			return false;
		}
	}

	public function login(){
		if(Authorization::isLogin()){
			header("Location:". DOMAIN);
		}
		$this->view->render("Form/login-form");
	}

	public function loggingIn(){
		// check if user has put blank username or password and submited the form.
		if($this->errBlankLogin()){ 
			//header("Location:". DOMAIN);
			echo "blank login";
		} 
		
		$username = $_POST["login-username"];
		$password = $_POST["login-password"];


		if($this->model->loggingInProceed($username, $password)){
			//header("Location:http://localhost/project4/");
			$loginStatus = true;
			$this->view->render("Form/login-status-form", $loginStatus);
		} else {
			$loginStatus = false;
			$this->view->render("Form/login-status-form", $loginStatus);
		}
	}
	
	public function ajaxSubmit(){
		
		if($this->loggingIn()){
			echo "true";
		} else {
			echo "false";
		}

	}

	public function errBlankLogin(){
		$username = $_POST["login-username"];
		$password = $_POST["login-password"];

		if(empty($username) || empty($password)) {
			return true;
		} else {
			return false;
		}
	}

	public function loggingOut(){
		if(Authorization::isLogin()){
			$flagLogout = Session::del('user');
			if(!$flagLogout) {
				echo "logout has something wrong, go check it out";
			}
		// when user logout
			// we should save cart data of user into database
			unset($_SESSION['cart']);

			header("Location:".DOMAIN);
		} else {
			echo "<br> logout failed";
			
		}
	}

	public function register(){
		$this->view->render("Form/register-form");
	}

	public function registering(){
		$err = array();
		echo "submit register";
	}
}