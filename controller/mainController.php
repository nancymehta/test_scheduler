<?php
class mainController extends common{
	
	
	
	function home() {
	try {
   		//$arrValue=$this->loadModel('base','login');
		$this->loadView("header");
		$this->loadView("main_reg_login");
		$this->loadView("main_body");
		$this->loadView("main_footer");

	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}
// 	function login() {
	
// 		try {
// 			echo "amitesh";
// 			//write code here3
// 			//$arrValue=$this->loadModel('base','login');
			
// 		} catch (Exception $e) {
// 			$this->handleException($e->getMessage());
// 		}
// 	}
	function register() {
		try {
			$arrValue=$this->loadModel('base','register');
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	function loginView()
	{
		$this->loadView('login');
	}
	
	function login()
	{
		
		$data = array(
				'username'=> $_POST['userName'],
				'password'=> $_POST['password']
				);
		$result=$this->loadmodel('base','login',$data);
	}
	
	function singleLoginLogic()
	{
		$result=$this->loadmodel('base','singleLoginLogic');
		if ($result == 1)
			echo "You are logged Out";
	}
	function __call($key,$index) {
		echo "yeah error";
	}

	
}
