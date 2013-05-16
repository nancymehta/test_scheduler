<?php
include SITE_ROOT . 'controller/mainController.php';
class userController extends mainController {
	function home() {
		$this->mytest();
	}
	/* provide view for category tab */	
	function category() {
		$userId		=	$_SESSION['SESS_USER_ID'];
		
		
		$ArrData	=	$this->loadModel('category','viewCategory',$userId);

	 	$this->loadView("header");
		$this->loadView ( "user_header" );
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category",$ArrData);
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
		if(isset($_SESSION['SESSION_ERROR'])){
			echo $_SESSION['SESSION_ERROR'];
		    $this->loadView ( "user_examiner_view/single_upload", $arrData );
		    unset($_SESSION['SESSION_ERROR']);
		}
		else{
			$this->loadView ( "user_examiner_view/single_upload", $arrData );
		}
	}
	
	function viewAllQuestion(){
		/**
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to show all question of that user categarywise
		 * Date_of_creation :14-5-2013
		 */
		//echo('oye');
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "user_examiner_view/deshboard_menu" );
		$arrData = $this->loadModel ( 'createTest', 'getTestCategories', array (
				"id" => $_SESSION ['SESS_USER_ID']
		) );
		$this->loadView ( "user_examiner_view/viewAllQuestion", $arrData );
		//print_r($arrData);
		//die();
	}
	function viewedAllQuestions(){
		/**
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to show all question of that user categarywise
		 * Date_of_creation :14-5-2013
		 */
	
		//print_r($_POST);
		//echo $_POST['category'];
		$category= $_POST['category'];
		$arrData = $this->loadModel ( 'viewAllQuestion','viewAllQuestion', array (
				"id" => $_SESSION ['SESS_USER_ID'],
				"category" => $category
		) );
		$this->loadView ( "user_examiner_view/viewQuestions", $arrData );
		//die();
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
	function settings() {
		try {
			$this->loadView("header");
			$this->loadView("user_header");
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$userId		=	$_SESSION['SESS_USER_ID'];
			$arrData	=	$this->loadModel('accountSettings','viewDetails',$userId);
			$this->loadView('settings_home',$arrData);
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}
?>
