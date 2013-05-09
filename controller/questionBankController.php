<?php
include SITE_ROOT.'controller/mainController.php';
class questionBankController extends mainController {
	function bulkUploadController() {
		try {
			if(isset($_POST['submit']))
			{
				$arrArgument=$this->loadModel('questionBank','bulkUploadModel');
				$this->loadView("header");
			  	$this->loadView("user_header");
			  	$this->loadView("user_examiner_view/deshboard_menu");
			  	$this->loadView("user_examiner_view/bulk_upload",$arrArgument);
				//print_r($arrArgument);
			}
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}

	function singleUploadController() {
		try {
			echo "single manage";
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}
