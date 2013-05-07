<?php
/* @author 		 :Siddarth Chowdhary	
 * @created on   :07-05-2013
* @desc		 :Controller to create a test.
****************Modifed Log ********************************
*Name			Task			Date			Description
*
*
************************************************************
*
*/
include SITE_ROOT.'controller/mainController.php';
class createTestController extends mainController {
	
	
	function test() {
		try {
	   		//$arrValue=$this->loadModel('base','login');
			//$this->loadView("main_page");
			echo 'sid';
		} catch (Exception $e) {
		  	$this->handleException($e->getMessage());
		} 		
	}
}