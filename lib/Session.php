<?php

class Session{
	//Session:: init();

	public static function init(){
		session_start();
	}

	public static function set($key, $val){
		$_SESSION[$key] = $val;

	}

	public static function get($key){
		if (isset($_SESSION[$key])) {
			return  $_SESSION[$key];
		}else{
			return false;
		}
	}

	public static function checkSeassion(){
		self::init();
		if (self::get("login")== false) {
			self::destroy();
			header("Location: login.php");
		}
	}


	public static function checkSeassionForReview(){
		self::init();
		if (self::get("login")== false) {
			session_destroy();
			header("Location: loginRegistation.php?val=login");
		}
	}

	public static function destroy(){
		session_destroy();
		header("Location: index.php");
	}

	public static function checkLoginOrNot(){
        return  @$_SESSION['login'];  }

	
}


?>