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
		$ArrData	=	$this->loadModel('category','viewCategory');
	 	$this->loadView("header");
	 	$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category",$ArrData);
		$this->loadView("header");
		
	}
	/*provide view for category tab*/
	function mytest() {
		$arrData = $this->loadModel ( 'createTest', 'getTestCategories',array("id"=>$_SESSION['SESS_USER_ID']));
		if (!empty($arrData)) {
			//print_r($arrData);
			$this->loadView("header");
			$this->loadView("user_header");
			$this->loadView("user_examiner_view/deshboard_menu");
			$this->loadView("user_examiner_view/maketestpage",$arrData);
		} else {
			echo 'could not display the page sorry.';
		}
		
	}
	/*provide view for category tab*/
	function questionbank() {
		$this->loadView("header");
		$this->loadView("user_header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	//$arrData=$this->loadModel("base","getCategory",array("id"=>$_SESSION['SESS_USER_ID']));
	 	$arrData = $this->loadModel ( 'createTest', 'getTestCategories',array("id"=>$_SESSION['SESS_USER_ID']));
	 	$this->loadView("user_examiner_view/single_upload",$arrData);
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