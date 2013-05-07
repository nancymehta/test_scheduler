<?php
include SITE_ROOT.'controller/mainController.php';
class userController extends mainController {

	function home() {
		$this->loadView("header");
		$this->loadView("user_header");
		$this->loadView("user_examiner_view/deshboard_menu");
		$this->loadView("user_examiner_view/maketestpage");
	}
}
?>