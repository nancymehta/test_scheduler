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
		 * modified by:Amitesh
		 * Date : 14-5-13
		 * Description: To add serverside validation
		 */
		try {
			//echo "single manage";
			if(isset($_POST['submit']))
			{  
				$flag=1;
				$_SESSION['SESSION_ERROR']="";
				echo '<pre>';
			 $totalOptions=$_POST['hiddenValue'];   
				  echo $totalOptions; 
				  	//print_r($_POST);
				  	//die();
				if(empty($_POST['question'])){
				   $_SESSION['SESSION_ERROR'].="Question Field is empty <br/>";
				   $flag=0;
			   }else if(empty($_POST['ques1'])){
				         $_SESSION['SESSION_ERROR'].="First option Field is empty <br/>";
				         $_SESSION['SESSION_ERROR'].="Use click to add option button bellow the queston field to add options  <br/>";
				         $flag=0;
				    }
				else if(empty($_POST['ques2'])){
				         $_SESSION['SESSION_ERROR'].="Second option Field is empty <br/>";
				         $flag=0;
				    }
				 if(!isset($totalOptions)|| empty($totalOptions)){   
				     if(empty($_POST['check1']) && empty($_POST['check2'])){
					     $_SESSION['SESSION_ERROR'].="Please give atleast one true answer <br/>";
				         $flag=0;    
					
					}
				}else{
					for($i =3;$i<= $totalOptions;$i++){
						if(empty($_POST['ques'."$i"])){
							 $_SESSION['SESSION_ERROR'].="option $i Field is empty <br/>";
							 $flag=0;
				         }
						}
					
					 $checkedFlag=0;
					for($i =1;$i<= $totalOptions;$i++){
						    if(!empty($_POST['check'."$i"])){
									$checkedFlag=1;
							}
						}
						if(!$checkedFlag){
							     $_SESSION['SESSION_ERROR'].="Please give atleast one true answer888 <br/>";  
							     $flag=0; 
							}
					
					}
				 
				 //for($i=0;$i<hiddenValue)    
				
				
				if($flag){
					$arrArgs = array(
							'question'=> htmlentities($_POST['question']),
							'option1'=> htmlentities($_POST['ques1']),
							'option2'=> htmlentities($_POST['ques2'])
					);
					if (!empty($_POST['check1'])){
						$arrArgs['ans1']= $_POST['check1'];
					}
					if (!empty($_POST['check2'])){
						$arrArgs['ans2']= $_POST['check2'];
					}
					if (!empty($_POST['feedback1'])){
						$arrArgs['feedback1']= strip_tags($_POST['feedback1']);
					}	
					if (!empty($_POST['feedback2'])){
						$arrArgs['feedback2']= strip_tags($_POST['feedback2']);
					}	
					
					if (!empty($_POST['ques3'])){
						$arrArgs['option3']= htmlentities($_POST['ques3']);
						if (!empty($_POST['check3'])){
							$arrArgs['ans3']= @$_POST['check3'];
						}
						if (!empty($_POST['feedback3'])){
							$arrArgs['feedback3']= strip_tags($_POST['feedback3']);
						}	
					}
					if (!empty($_POST['ques4'])){
						$arrArgs['option4']= htmlentities($_POST['ques4']);
						if (!empty($_POST['check4'])){
							$arrArgs['ans4']= @$_POST['check4'];
						}
						if (!empty($_POST['feedback4'])){
							$arrArgs['feedback4']= strip_tags($_POST['feedback4']);
						}
					}
					if (!empty($_POST['ques5'])){
						$arrArgs['option5']= htmlentities($_POST['ques5']);
						if (!empty($_POST['check5'])){
							$arrArgs['ans5']= @$_POST['check5'];
						}
						if (!empty($_POST['feedback5'])){
							$arrArgs['feedback5']= strip_tags($_POST['feedback5']);
						}
					}
			
					//print_r($arrArgs);
					$arrArgument=$this->loadModel('questionBank','singleUploadModel',$arrArgs);
					if( $arrArgument==1){
						$_SESSION['SESSION_ERROR'].= 'Question Inserted successfully';
						header("location:".SITE_PATH."user/questionbank");
					}
					else{
						$_SESSION['SESSION_ERROR'].= 'Question not Inserted';
					}
				}
				else{ 
					//print_r($_POST['submit']);
					$_SESSION['SESSION_ERROR'].=  'Note : Please fill all the mandatory field'. "<input type='button' id='aReload' value='clickMeToReloadHistory' />";	
					header("location:".SITE_PATH."user/questionbank");	
				}	
		    }			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	 /*function will delete questions from particular test*/   
    public function deleteQues()
    {
		//die('delete');
	     //print_r($_GET);
			
		     $qid	= $_GET['qid'];
		   	 $arrData['qid']=$qid;
		   	 $this->loadView("header");
			 $this->loadView("user_header");
			 $this->loadView("user_examiner_view/deshboard_menu");
			 $result=$this->loadModel('viewAllQuestion','deleteQues',$arrData);
			 // $result =	this->loadModel('viewAllQuestion','deleteQues',$arrArgs);
						 
			 if($result==1){
			     $_SESSION['SESSION_ERROR']= 'Question Deleted successfully';
					  // header("location: ".SITE_PATH."index.php?controller=managetest&function=showQues");
					$category_id=$_SESSION['SESS_CATEGORY_ID'];
				    unset($_SESSION['SESS_CATEGORY_ID']);
				    header("location:".SITE_PATH."user/viewedAllQuestions?category= $category_id");	
					
					  
				}
				else{
				    $_SESSION['SESSION_ERROR']= 'Question Deleted Unsuccessful';	 
				    $category_id=$_SESSION['SESS_CATEGORY_ID'];
				    unset($_SESSION['SESS_CATEGORY_ID']);
				    header("location:".SITE_PATH."user/viewedAllQuestions?category= $category_id");	
					}
				    
    }
    /*function will edit questions from particular test*/   
    public function editQues(){
	
        $arrData['id']  =	$_REQUEST['qid'];
        $this->loadView("header");
		$this->loadView("user_header");
		$this->loadView("user_examiner_view/deshboard_menu");
		$arrArgument	=	$this->loadModel('viewAllQuestion','editQues',$arrData);
        //print_r($arrArgument);
        $this->loadView("user_examiner_view/editques",$arrArgument);
       	//$this->loadView("user_examiner_view/deshboard_menu");
    }
    
    /*function will update questions from particular test*/       
    public function quesUpdate(){
		    echo '<pre>';
			print_r($_REQUEST);
			die('edited');
        $questionAnswers['qid']		=	$_REQUEST['qid'];
        $questionAnswers['question']	=	$_REQUEST['question'];
        $questionAnswers['A']		=	$_REQUEST['A'];
        $questionAnswers['B']		=	$_REQUEST['B'];
        $questionAnswers['C']		=	$_REQUEST['C'];
        $questionAnswers['D']		=	$_REQUEST['D'];
        $questionAnswers['ans']		=	$_REQUEST['ans'];
		//      print_r($questionAnswers);
        $result	=	loadModel('managetest','quesUpdate',$questionAnswers);
        	
        if($result=="updated"){
				header("location: ".SITE_PATH."index.php?controller=managetest&function=showQues");
			}
        
        }
}
?>
