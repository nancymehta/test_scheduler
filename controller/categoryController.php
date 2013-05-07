<?php
include SITE_ROOT.'controller/mainController.php';
class categoryController extends mainController {
	function manageCategory() {
	try {		
			//print_r($_REQUEST);
			$ArrArgs	=	$_REQUEST['categoryName'];
			$ArrData	=	$this->loadModel('category','addCategory',$ArrArgs);
 			if($ArrData=="done")
 			{
 				$ArrData	=	$this->loadModel('category','viewCategory');
 			}
			echo $ArrData;
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function home() {
	 	$this->loadView("header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category");
	 }
}
