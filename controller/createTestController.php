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
*Ashwani		Certificate			12/5/13			Added methods for certificate management 
*Siddarth		manage qs			13/5/13			added manageQuestion
************************************************************
*
*/
include SITE_ROOT . 'controller/mainController.php';
class createTestController extends mainController {
	public $validationObj;
	
	//Making the object of validation Class
	public function __construct()
	{
		$this->validationObj	=	new validation();
	}
	
	function createNewTest() {
		try {
			
			if ((! empty ( $_POST ['test_name'] )) && (! empty ( $_POST ['category_name'] ))) {
				$testName = strip_tags ( $_POST ['test_name'] );
				$categoryName = $_POST ['category_name'];
				#server side validation - alphabetic for test name
				if ($this->validationObj->validateAlphabate ( $testName )) {
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
						throw new Exception;
					}
				} else {
					echo ' for test name';
					throw new Exception;
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
				#server side validation for - test name - alphabetic validation
				if ($this->validationObj->validateAlphabate ( $testName )) {
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
				} else {
					echo ' for test name';
					throw new Exception ();
				}
			} else {
				echo 'please select test name and category';
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	function testSettings() {
		try {
			$testId = strip_tags ( $_POST ['testId'] );
			$random = strip_tags ( $_POST ['random'] );
			$testName='';
			if (isset($_GET ['test_name'])){
				$testName = strip_tags ( $_GET ['test_name'] );
			}
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
					'test_name' => $testName,
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
	
	function manageQuestion() {
		try {
			$arrData = $this->loadModel ( 'createTest', 'updateTestCategory', $_POST);
			if ($arrData){
				header("location:http://test_scheduler.com/user/mytest");
			} else {
				throw new Exception();
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	function deleteTest() {
		try {
			$arrData = $this->loadModel ( 'createTest', 'deleteTest', $_POST['id']);
			if ($arrData){
				echo 'Test Deleted';
			} else {
				throw new Exception();
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	/********Methods related to certificate management **************/

	# method to show certificate create view
	function showCertificateCreate() {
		try {
			$this->loadView("header" );
			$this->loadView("user_header" );
			$this->loadView("user_examiner_view/deshboard_menu" ); 
			$this->loadView("user_examiner_view/showCertificateCreate");
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	# method to create certificate 
	function certificateCreate() { 
		try { 
			if ((! empty ($_POST ['certificate_name'])) && 
				(! empty ($_POST ['certificate_body'])))	{
				$certificateName	 = strip_tags ($_POST ['certificate_name']);
				$certificateBody 	 = strip_tags ($_POST ['certificate_body']);
				$arrArgs = array (
						'name' 				=> $certificateName,			
						'certificate_body' 	=> $certificateBody 
				);
				$boolResult = $this->loadModel ( 'createTest', 'createNewCertificate', $arrArgs );
				if ($boolResult) {
					echo 'created the certificate successfully';
				} else {
					echo 'could not create certificate';
				}
			} else {
					echo "no input";
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	#method to show certificate 
	function showCertificate() {  
		try {  
				#create array containg user details like name, marks , total marks 
				$arrArgs = array(  
									'userName'			=> 'Dean_Winchester',
									'marksObtained'		=> '97',
									'totalMarks'		=> '100',
									'testDate'			=> '12/05/13',
									'id' 		=> 1, 
							); 
							
				#loading model to retrieve certificate details			
				$Result = $this->loadModel ( 'createTest', 'showCertificate', $arrArgs ); 
				if ($Result) {
					
					#merging userdetails and certificate details
					$result_data = array_merge($arrArgs,$Result); 
					 
					#loading model to dynamically generate certificate 
					$this->loadModel ( 'createTest', 'drawCertificate', $result_data ); 
				} else {
					echo 'could not show certificate';
				}	
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}
