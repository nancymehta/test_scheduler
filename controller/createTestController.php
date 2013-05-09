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
include SITE_ROOT.'controller/mainController.php';
class createTestController extends mainController {
	function createNewTest() {
		try {
			if ((! empty ( $_POST ['test_name'] )) && (! empty ( $_POST ['test_name'] ))) {
				$testName = strip_tags ( $_POST ['test_name'] );
				$categoryName = strip_tags ( $_POST ['category_name'] );
				$arrArgs = array (
						'testName' => $testName,
						'categoryName' => $categoryName,
						'user_id' => $_SESSION ['SESS_USER_ID'] 
				);
				$boolResult = $this->loadModel ( 'createTest', 'createNewTest', $arrArgs );
				if ($boolResult) {
					echo 'created the test successfully';
				} else {
					echo 'could not create the test';
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}