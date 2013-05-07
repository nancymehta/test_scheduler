<?php
class mainController extends common{
	
	
	
	function home() {
	try {
   		//$arrValue=$this->loadModel('base','login');
		$this->loadView("main_page");
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}
	function login() {
		
		try {
			
			$arrValue=$this->loadModel('base','login');
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function register() {
		try {
			$arrValue=$this->loadModel('base','register');
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function __call($key,$index) {
		echo "yeah Error";
	}
}