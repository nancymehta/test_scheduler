<?php
include SITE_ROOT.'controller/mainController.php';
class categoryController extends mainController {
	function manageCategory() {
	try {
			
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function category() {
 	$this->loadView("header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/category");
	 }
}
