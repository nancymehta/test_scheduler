<?php
include SITE_ROOT.'controller/mainController.php';
class userController extends mainController {

	function home() {
		$this->loadView("header");
		$this->loadView("user_header");
		$this->loadView("user_examiner_view/deshboard_menu");
		$this->loadView("user_examiner_view/maketestpage");
	}
	/*provide view for category tab*/
	function category() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category");
	}
	/*provide view for category tab*/
	function mytest() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/maketestpage");
	}
	/*provide view for category tab*/
	function questionbank() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	}
	/*provide view for category tab*/
	function certificate() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	}
	/*provide view for result tab*/
	function result() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	}
	/*provide view for assign tab*/
	function assign() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	}

}
?>