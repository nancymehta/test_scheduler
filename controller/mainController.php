<?php
class mainController {
	
	
	
	function home() {
	try {
   		//$arrValue=$this->loadModel('base','login');
		loadView("main_page");
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}
	function login() {
		
		try {
			
			$arrValue=loadModel('base','login');
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function register() {
		try {
			$arrValue=loadModel('base','register');
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function __call($key,$index) {
		echo "yeah Error";
	}
}