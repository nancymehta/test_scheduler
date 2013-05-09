<?php
/*
 * Result Controller for displaying Result*/
include SITE_ROOT.'controller/mainController.php';
class resultController extends mainController {
/*provide view for result tab*/
	function result() {
		$result=$this->loadModel("result","populateDropDown");
		$this->loadView("header");
		$this->loadView("user_header");
		$this->loadView("user_examiner_view/deshboard_menu");
		//$result=$this->loadModel('result','overallResult',array('id'=>$_SESSION['SESS_USER_ID']));
	 	$this->loadView("user_examiner_view/users_overall_result",$result);
	 //	$arrData= $this->loadModel("result","getResults",array('id'=>$_SESSION['SESS_USER_ID']));
	 	//$this->loadView("result",$arrData);
	}
}

?>
