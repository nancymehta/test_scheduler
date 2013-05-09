<?php
include SITE_ROOT.'controller/mainController.php';
class questionBankController extends mainController {
	function bulkUpload() {
		try {
			echo "manage";
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}

	function singleUpload() {
		try {
			echo "manage";
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}
