<?php
/**
 * Filename : mainController.php
 * Updated By : Amitesh Bharti
 * Description : provides main controller to control job like show home page,login to database etc
 * Date_of_creation :6-5-2013
 */
//ini_set('display_errors','1');
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
	function faq() {// function name need to be change
		try {
			//$arrValue=$this->loadModel('base','login');
			
	
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}

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
		//die('oye');
		$arrArgs = array(
				'username'=> $_POST['user_name'],
				'password'=> $_POST['password']
				);
		//die('fdsff');
		//print_r($data);
		$arrData=$this->loadmodel('base','login',$arrArgs);
		if($arrData == 1){
			echo 'You are logged in nows';
			header("location:".SITE_PATH."index.php");
		}
		else{
			die('OOPS sorry');
		}
		
	}
	function logout(){
		
		$_SESSION['SESS_USER_NAME']="";
		$_SESSION['SESS_USER_TYPE']="";
		unset($_SESSION);
		header("location:".SITE_PATH."index.php");

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
