<?php
include SITE_ROOT.'controller/mainController.php';
class questionBankController extends mainController {
	function manageQuesBank() {
		try {
			echo "manage";
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}