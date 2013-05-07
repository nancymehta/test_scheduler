<?php
echo "SDsd";
class mainController extends common{
	
	
	
	function home() {
	try {
   		$this->loadModel('base','register');
		$this->loadView("login");
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}
}