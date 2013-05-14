<?php
include SITE_ROOT.'controller/mainController.php';
class questionBankController extends mainController {
function bulkUploadController() {
		try {
			if(isset($_POST['submit'])){
				$file=$_FILES["file"]["name"];
				$extension = substr($_FILES['file']['name'],
						strrpos($_FILES['file']['name'],'.')+1);
				if($extension=='csv')
				{
					$arrArgument=$this->loadModel('questionBank','bulkUploadModel');
				}
				else{
					$arrArgument="Enter Correct Format";
				}
					$this->loadView("header");
					$this->loadView("user_header");
					$this->loadView("user_examiner_view/deshboard_menu");
					$this->loadView("user_examiner_view/bulk_upload",$arrArgument);
			}
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}

	function singleUploadController() {
		/**
		 * 
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to main controller to add single question into perticual users' Test 
		 * Date_of_creation :9-5-2013
		 */
		try {
			//echo "single manage";
			if(isset($_POST['submit']))
			{  
				echo '<pre>';
				//print_r($_POST);
				$arrArgs = array(
						'question'=> @$_POST['question'],
						'option1'=> @$_POST['ques1'],
						'option2'=> @$_POST['ques2']
				);
				if (!empty($_POST['check1'])){
					$arrArgs['ans1']= @$_POST['check1'];
				}
				if (!empty($_POST['check2'])){
					$arrArgs['ans2']= @$_POST['check2'];
				}
				if (!empty($_POST['feedback1'])){
				    $arrArgs['feedback1']= @$_POST['feedback1'];
				}	
				if (!empty($_POST['feedback2'])){
					$arrArgs['feedback2']= @$_POST['feedback2'];
				}	
				
				if (!empty($_POST['ques3'])){
					$arrArgs['option3']= @$_POST['ques3'];
					if (!empty($_POST['check3'])){
						$arrArgs['ans3']= @$_POST['check3'];
					}
					if (!empty($_POST['feedback3'])){
						$arrArgs['feedback3']= @$_POST['feedback3'];
					}	
				}
				if (!empty($_POST['ques4'])){
					$arrArgs['option4']= @$_POST['ques4'];
					if (!empty($_POST['check4'])){
						$arrArgs['ans4']= @$_POST['check4'];
					}
					if (!empty($_POST['feedback4'])){
						$arrArgs['feedback4']= @$_POST['feedback4'];
					}
				}
				if (!empty($_POST['ques5'])){
					$arrArgs['option5']= @$_POST['ques5'];
					if (!empty($_POST['check5'])){
						$arrArgs['ans5']= @$_POST['check5'];
					}
					if (!empty($_POST['feedback5'])){
						$arrArgs['feedback5']= @$_POST['feedback5'];
					}
				}
		
				//print_r($arrArgs);
			    $arrArgument=$this->loadModel('questionBank','singleUploadModel',$arrArgs);
			    if( $arrArgument==1){
			    	$_SESSION['QUES_INSERTED']= 'Question Inserted successfully';
			    	header("location:".SITE_PATH."user/questionbank");
			    }
			    else{
			    	$_SESSION['QUES_INSERTED']= 'Question not Inserted';
			    }
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
