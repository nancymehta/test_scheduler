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
include SITE_ROOT . 'controller/mainController.php';
class createTestController extends mainController {
	function createNewTest() {
		try {
			
			if ((! empty ( $_POST ['test_name'] )) && (! empty ( $_POST ['category_name'] ))) {
				$testName = strip_tags ( $_POST ['test_name'] );
				$categoryName = $_POST ['category_name'];
				// echo $testName;
				// print_r($categoryName);
				$arrArgs = array (
						'testName' => $testName,
						'categoryName' => $categoryName,
						'user_id' => $_SESSION ['SESS_USER_ID'] 
				);
				$boolResult = $this->loadModel ( 'createTest', 'createNewTest', $arrArgs );
				if ($boolResult) {
					echo 'created the test successfully';
					header ( "location:http://test_scheduler.com/user/mytest" );
				} else {
					echo 'could not create the test';
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	function editTest(){
		try {
			$arrData_1 = $this->loadModel ( 'createTest', 'getTestCategories', array (
					"id" => $_SESSION ['SESS_USER_ID']
			) );
			$arrData=array('category'=>$arrData_1,'testName'=>$_REQUEST['test_name']);
			echo 'test id : '.$_REQUEST['test_id'];
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/edit_test",$arrData);
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	function updateTest(){
		try {
				
				//echo $_POST['test_name'];echo  $_POST ['category_name'];
				if ((! empty ( $_POST ['test_name'] )) && (! empty ( $_POST ['category_name'] ))) {
					$testName = strip_tags ( $_POST ['test_name'] );
					$categoryName = $_POST ['category_name'];
					//echo $testName;
					//print_r($categoryName);
					//die("here");
					$arrArgs = array (
							'testName' => $testName,
							'categoryName' => $categoryName,
							'user_id' => $_SESSION ['SESS_USER_ID']
					);
					$boolResult = $this->loadModel ( 'createTest', 'updateTest', $arrArgs );
					if ($boolResult) {
						echo 'updated the test successfully';
						header ( "location:http://test_scheduler.com/user/mytest" );
					} else {
						echo 'could not update the test';
					}
				}
				
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}