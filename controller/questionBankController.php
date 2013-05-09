<?php
include SITE_ROOT.'controller/mainController.php';
class questionBankController extends mainController {
	function bulkUploadController() {
		try {
			if(isset($_POST['submit']))
			{
				$arrArgument=$this->loadModel('questionBank','bulkUploadModel');
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
