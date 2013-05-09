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
			//echo "single manage";
			if(isset($_POST['submit']))
			{   print_r($_POST);
				$arrArgs = array(
						'question'=> @$_POST['question'],
						'ques1'=> @$_POST['ques1'],
						'ques2'=> @$_POST['ques2']
				);
				if (!empty($_POST['ques1'])){
					echo 'grrrrr';
					$arrArgs['ans1']= @$_POST['ques1'];
				}
				if (!empty($_POST['ques2'])){
					echo 'grrrrr';
					$arrArgs['ans2']= @$_POST['ques2'];
				}
				if (!empty($_POST['feedback1'])){
				    echo 'grrrrr';
				    $arrArgs['feedback1']= @$_POST['feedback1'];
				}	
				if (!empty($_POST['feedback2'])){
					echo 'grrrrr';
					$arrArgs['feedback=2']= @$_POST['feedback2'];
				}	
				print_r($arrArgs);
			    //$arrArgument=$this->loadModel('questionBank','singleUploadModel');
			}
			else{ 
				//print_r($_POST['submit']);
				die('checking');		
			}	
				
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
}
