<?php
/* @author 		 :Siddarth Chowdhary	
 * @created on   :07-05-2013
* @desc		 :Controller to create a test.
****************Modifed Log ********************************
*Name			Task			    Date			Description
*Siddarth       created 3 funcs     9/5/13          added createNewTest,editTest,updateTest
*Siddarth							10/5/13			worked on above 3 functions
*Siddarth							11/5/13			created test settings
*Siddarth							12/5/13			worked on test settings
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
	function editTest() {
		try {
			$arrData_1 = $this->loadModel ( 'createTest', 'getTestCategories', array (
					"id" => $_SESSION ['SESS_USER_ID'] 
			) );
			$arrData = array (
					'category' => $arrData_1,
					'testName' => $_REQUEST ['test_name'],
					'test_id' => $_REQUEST ['test_id'] 
			);
			echo 'test id : ' . $_REQUEST ['test_id'];
			$this->loadView ( "header" );
			$this->loadView ( "user_header" );
			$this->loadView ( "user_examiner_view/deshboard_menu" );
			$this->loadView ( "user_examiner_view/edit_test", $arrData );
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	function updateTest() {
		try {
			if ((! empty ( $_POST ['test_name'] )) && (! empty ( $_POST ['category_name'] ))) {
				$testName = strip_tags ( $_POST ['test_name'] );
				$categoryName = $_POST ['category_name'];
				$arrArgs = array (
						'testName' => $testName,
						'categoryName' => $categoryName,
						'test_id' => $_POST ['testId'],
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
	function testSettings() {
		try {
			$testId = strip_tags ( $_POST ['testId'] );
			$random = strip_tags ( $_POST ['random'] );
			if ($random == 'yes') {
				$random = '0';
			} else {
				$random = '1';
			}
			$startTime = strip_tags ( $_POST ['startTime'] );
			$endTime = strip_tags ( $_POST ['endTime'] );
			$timeDuration = strip_tags ( $_POST ['timeDuration'] );
			$perPageQuestions = strip_tags ( $_POST ['perPageQuestions'] );
			$feedback = strip_tags ( $_POST ['feedback'] );
			if ($feedback == 'yes') {
				$feedback = '0';
			} else {
				$feedback = '1';
			}
			$emailScore = strip_tags ( $_POST ['emailScore'] );
			$passingMarks = strip_tags($_POST['passingMarks']);
			if ($emailScore == 'yes') {
				$emailScore = '0';
			} else {
				$emailScore = '1';
			}
			$arrArgs = array (
					'test_id' => $testId, 
					'random' => $random, 
					'start_time' => $startTime, 
					'end_time' => $endTime,
					'time_limit' => $timeDuration,
					'feedback' => $feedback,
					'pass_marks' => $passingMarks,
					'email_results' =>$emailScore,
					'created_by' =>$_SESSION['SESS_USER_ID'],
					'per_page_ques' =>$perPageQuestions
					 );
			$boolResult = $this->loadModel ( 'createTest', 'testSettings', $arrArgs );
			if ($boolResult) {
				echo 'updated the test successfully';
				header ( "location:http://test_scheduler.com/user/mytest" );
			} else {
				echo 'could not update the test';
			}
					 
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}