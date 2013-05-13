<?php
include SITE_ROOT . 'controller/mainController.php';
class userController extends mainController {
	function home() {
		$this->mytest();
	}
	/* provide view for category tab */	
	function category() {
		$ArrData = $this->loadModel ( 'category', 'viewCategory' );
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );
		$this->loadView ( "user_examiner_view/category", $ArrData );
		$this->loadView ( "header" );
	}
	
	/**
	 * Created By : Siddarth Chowdhary
	 * Description : provides functionality show test page with dynamic values
	 * Date_of_creation :9-5-2013
	 */
	function mytest() {
		$arrData_1 = $this->loadModel ( 'createTest', 'getTestCategories', array (
				"id" => $_SESSION ['SESS_USER_ID'] 
		) );
		$arrData_2 = $this->loadModel ( 'createTest', 'getTestNames', array (
				"id" => $_SESSION ['SESS_USER_ID'] 
		) );
		$arrData = array (
				'category' => $arrData_1,
				'test' => $arrData_2 
		);
		if (! empty ( $arrData )) {
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/maketestpage", $arrData );
		} else {
			echo 'could not display the page sorry.';
		}
	}
	/* provide view for category tab */
	function questionbank() {
		/**
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to add single question
		 * Date_of_creation :6-5-2013
		 */
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );
		// $arrData=$this->loadModel("base","getCategory",array("id"=>$_SESSION['SESS_USER_ID']));
		$arrData = $this->loadModel ( 'createTest', 'getTestCategories', array (
				"id" => $_SESSION ['SESS_USER_ID'] 
		) );
		// print_r($arrData);
		$this->loadView ( "user_examiner_view/single_upload", $arrData );
	}
	
	/* provide view for category tab */
	function certificate() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );
		$this->loadView ( "user_examiner_view/manageCertificate" );
	}
	/* provide view for result tab */
	function result() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );
	 	$arrData= $this->loadModel("base","getResults",array('id'=>$_SESSION['SESS_USER_ID']));
	 	
	 	$this->loadView("result",$arrData);
	}
	/* provide view for assign tab */
	function assign() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );

	}
	/**
	 * Created By : Siddarth Chowdhary
	 * Description : provides functionality show exam Settings
	 * Date_of_creation :10-5-2013
	 */
	function examSettings() {
		$arrData = $this->loadModel ( 'createTest', 'getTestLinkValues', array (
				"test_id" => $_GET ['test_id']
		) );
		if (! empty ( $arrData )) {
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/examSettings", $arrData );
		} else {
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/examSettings" );
		}
	}
	/**
	 * Created By : Siddarth Chowdhary
	 * Description : provides functionality show manage Qusetions Page
	 * Date_of_creation :13-5-2013
	 */
	function manageQuestions() {
		$arrData = $this->loadModel ( 'createTest', 'getTestCategoryValues', array (
				"test_id" => $_GET ['test_id']
		) );
		if (! empty ( $arrData )) {
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/manageQuestions", $arrData );
		} else {
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/manageQuestions" );
		}
	}
	function allTest() {
		$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$arrArgs = $this->loadModel ( "base", "fetchTests" );
			$this->loadView ( "user_examiner_view/test_management", $arrArgs );			
	}
}
?>