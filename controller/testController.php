<?php

include SITE_ROOT.'controller/mainController.php';
/*
 * class testController
 * testController controls the flow of information to testModel while a test is in execution.
*/
class testController extends mainController {
	/*
	 * function candidateInfo()
	 * candidateInfo sends the information like first name, last name, etc to the testModel
	*/
	function candidateInfo() {
		$url = explode ( "/", @$_REQUEST ['function'] );
		if (count ( $url ) > 2) {
			$testUrl=$url[2];
			$_SESSION['test_url']=$testUrl;
			$test=$this->loadModel("test","getTestId",array("link"=>"$testUrl"));
			$res=$this->loadModel("test","fetchTestDetails",$test);
			$details=$res['details'];
			//if(time()<$details['start_time']) {
				$arrArgs=array(
							"first_name"=>$_POST['firstName'],
							"last_name"=>$_POST['lastName'],
							"email_enroll_no"=>$_POST['email'],
							"test_link_id"=>$test['test_link_id'],
							"test_id"=>$test['test_id'], 
							"start_time"=>"now()",
							"ip_address"=>$_SERVER['REMOTE_ADDR'],
							"created_by"=>'1',//taken default value 
									//	must be retrived from db according to test_id
							);
			$result=$this->loadModel("test","setUser",$arrArgs);
			if($result) {
			//setting parameter in session so that we dont have to retrive 
			//everytime the page is refreshed
			$_SESSION['guest_id']=$result; //store unique id of the test taker
			$_SESSION['question']="0"; 	
			$_SESSION['pass_marks']=$details['pass_marks'];
			$_SESSION['total_question']=1;
			$_SESSION['duration']=$details['time_limit'];
			if($_SESSION['duration']==0) {
				$_SESSION['duration']=180;
			}
			$_SESSION['time']=time();
			$_SESSION['review']=array();
			$_SESSION['answers']=array(); //if previous button is introduced 
							//rather than checking from db for previous answers
			$_SESSION['select_answer']=$details['select_answer'];							
			$_SESSION['questions']=$res['questions'];
			if($details['random']=='1') {
				shuffle($_SESSION['questions']);
			}
			header("location:".SITE_PATH."test/home/".$testUrl)	;

		}
		} else {
			$this->getSpace();
				echo "Please Try Later! You Are not valid user to take test";	
		}
		/*} else {
			echo "Test is not Started Yet";
		}*/
	}
	
	/*
	 * function startTest()
	 * startTest controls the flow of information while starting the execution of test
	*/
	function startTest($test=array()) {
		
		$question=$this->loadModel("test","fetchQuestions",$test);
		$_SESSION['total_question']=count($question)/2;
		$this->loadView("test_view",$question);

	}
	
	/*
	 * function home()
	 * home is the default function of testController
	 * It loads the first view of the test page
	*/
	function home() {
		
		$this->loadView("header");
	 	$this->loadView("test_header");
	  	$url = explode ( "/", @$_REQUEST ['function'] );
		if (count ( $url ) > 2 ) {
			$testUrl=$url[2];
			$testUrl;
			$test=$this->loadModel("test","getTestId",array("link"=>"$testUrl"));
			if($test!=-1) {
				if(!(isset($_SESSION['guest_id'])) || @$_SESSION['guest_id']=="") {
					if(isset($_POST['submit']) ) {
						$this->candidateInfo();
					}
					$res=$this->loadModel("test","fetchTestTime",$test);
					if($res['start_time']=='0' || $res['end_time']=='0' ) {
						$this->loadView('user_examiner_view/user_test_info');
					}
					else if($res['start_time']<=time() && $res['end_time']>=time()  ) {
						$this->loadView('user_examiner_view/user_test_info');
					} else {
						//to be deleted
						$this->loadView('user_examiner_view/user_test_info');
						echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>
						Test Time is Not Started or Ended";
					}
					//
				} else {
					/// all The Test Settings here :D
					if($_SESSION['question']>=$_SESSION['total_question']) {
								$this->finishTest();
					} else if(($_SESSION['time']+($_SESSION['duration']*60))<time()) {
					/*For test to finish in given Duration*///TO be verified
						$this->getSpace();
						echo "TIMES UP";
						$this->finishTest();
					}
					else {
						$this->startTest($test);
					}
				}
			} else {
				$this->getSpace();
				echo "Test Does Not Exisit";
			}
		} else {
			$this->getSpace();
			echo "NO test Selectedd";
		}
	}
	
	/*
	 * function next()
	 * next deals with the maintaining the information of the current page and forwarding to
	 * next question page
	*/
	function next() {
		
		if(isset($_REQUEST['review'])) {
			array_push($_SESSION['review'],$_SESSION['questions'][$_SESSION['question']]);
		}	
		if(!empty($_POST['coption']) && $_POST['coption']!="" ) {
			$arrArgs =array(
		 	"test_taker_id"=>$_SESSION['guest_id'],
		 	"ques_id"=>$_POST['question_id'],
		 	"answer_given"=>$_POST['coption'],
		 	"created_by"=>'1',//taken default value 
								//	must be retrived from db according to test_id
						);
		$this->loadModel("test","insertAnswer",$arrArgs);
		$questionId=$_POST['question_id'];
		$answersId=$_POST['coption'];
		$_SESSION['answers']["$questionId"]=$answersId;
		$_SESSION['question']+=1;
		if($_SESSION['question']>=$_SESSION['total_question']) {
			$_SESSION['question']=0;
		}
		
	} else {
		if($_SESSION['select_answer']=='1') {
			$_SESSION['question']+=1;
			if($_SESSION['question']>=$_SESSION['total_question']) {
				$_SESSION['question']=0;
			}
		}
	}
		header("location:"."http://test_scheduler.com".$_SERVER['REQUEST_URI']);
	}
	
	/*
	 * funciton finishTest()
	 * finishTest deals with the flow of information while finishing the test
	*/
	function finishTest() {
		/*call a function to give result using guest id 
		and load it to the view*/
		$_SESSION['total_question']=0; //indicates test is over
		$this->loadView("header");
	 	$this->loadView("user_header");
	 	$arrData=array();
	 	if(isset($_SESSION['guest_id']) && !empty($_SESSION['answers']) ) {
	 		$arrData=$this->loadModel("test","fetchSpecificResult",array("id"=>$_SESSION['guest_id']));
	 	 	$result=$this->loadModel("test","insertResult",$arrData);	
	 	 }
		
		if(empty($_SESSION['answers'])) {
			$arrData=$this->loadModel("test","fetchUser",array("id"=>$_SESSION['guest_id']));
			$this->loadView("finish_test",$arrData);	
		} else {
			$this->loadView("finish_test",$arrData);
		}
		
	}
	
	/*
	 * function exitTest()
	 * exitTest takes the examinee out of the test and redirects him to Main Page, finishing the test.
	*/
	function exitTest() {
		$_SESSION['guest_id']="";
		session_unset();
		header("location:".SITE_PATH);
	}
	
	/*
	 * function showAttempted()
	 * showAttempted loads the required model to fetch all the attempted questions for the current test.
	*/
	function showAttempted() {
		$question=$this->loadModel("test","fetchAttemptedQuestions",$_SESSION['answers']);
		$this->loadView("showattempted",$question);		
		
	}
	/*
	 * function prev()
	 * prev controls the flow of information while going back to previous question.
	 * it saves the state of the current question.
	*/
	function prev() {

		if(isset($_REQUEST['review'])) {
			array_push($_SESSION['review'],$_SESSION['question']);
		}	
		if(!empty($_POST['coption']) && $_POST['coption']!="" ) {
			$arrArgs =array(
		 	"test_taker_id"=>$_SESSION['guest_id'],
		 	"ques_id"=>$_POST['question_id'],
		 	"answer_given"=>$_POST['coption'],
		 	"created_by"=>'1',//taken default value 
								//	must be retrived from db according to test_id
						);
		$this->loadModel("test","insertAnswer",$arrArgs);
		$questionId=$_POST['question_id'];
		$answersId=$_POST['coption'];
		$_SESSION['answers']["$questionId"]=$answersId;
		$_SESSION['question']-=1;
		if($_SESSION['question']<0) {
			$_SESSION['question']=$_SESSION['total_question']-1;
		}

	} else {
		if($_SESSION['select_answer']=='1') {
			$_SESSION['question']-=1;
			if($_SESSION['question']<0) {
				$_SESSION['question']=$_SESSION['total_question']-1;
			}
		}
	}
		header("location:"."http://test_scheduler.com".$_SERVER['REQUEST_URI']);
	}
	
	/*
	 * function feedback()
	 * feedback loads the required model to fetch the feedback after the test.
	*/
	function feedback() {
		if(isset($_POST['feedback'])) {
			$arrArgs=array(
				"feedback"=>$_POST['feedback'],
				);
			$arrData=$this->loadModel("test","insertFeedback",$arrArgs);
		}
		$this->finishTest();
	}
	
	/*
	 * function navigateQuestion()
	 * navigateQuestion takes the examinee to the specified question
	*/
	function navigateQuestion() {
		$question=$_REQUEST['question'];
		$index=array_search($question,$_SESSION['questions']);
		if($index===false) {
			$_SESSION['question']=0;
		} else {
			$_SESSION['question']=$index;
		}
		header("location:".SITE_PATH."test/home/".$_SESSION['test_url']);
	}
	function getSpace() {
		echo "<br/><br/><br/><br/><br/><br/><br/><br/><br/>";
	}
} 

