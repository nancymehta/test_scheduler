<?php

include SITE_ROOT.'controller/mainController.php';

class testController extends mainController {
	
	function candidateInfo() {
		$url = explode ( "/", @$_REQUEST ['function'] );
		if (count ( $url ) > 2) {
			$testUrl=$url[2];
			echo $testUrl;
			$test=$this->loadModel("test","getTestId",array("link"=>"$testUrl"));
			$arrArgs=array(
						"first_name"=>$_POST['firstName'],
						"last_name"=>$_POST['lastName'],
						"email_enroll_no"=>$_POST['email'],
						"test_link_id"=>$test['test_link_id'],
						"test_id"=>$test['test_id'], 
						"created_by"=>'1',//taken default value 
								//	must be retrived from db according to test_id
						);
		$result=$this->loadModel("test","setUser",$arrArgs);
		if($result) {
			$details=$this->loadModel("test","fetchTestDetails",$test);
			//setting parameter in session so that we dont have to retrive 
			//everytime the page is refreshed
			echo $_SESSION['guest_id']=$result;
			$_SESSION['question']="1"; 	
			$_SESSION['total_question']=5;
			$_SESSION['duration']=$details['time_limit'];
			$_SESSION['time']=time();
			$_SESSION['answers']=array(); //if previous button is introduced 
											//rather than checking from db for previous answers

			header("location:".SITE_PATH."test/home/".$testUrl)	;

		}
		} else {
				echo "NO test Selectedd11";	
		}
	}
	
	function startTest($test=array()) {
		//echo $testId;
		$question=$this->loadModel("test","fetchQuestions",$test);
		$this->loadView("test_view",$question);

	}
	
	function home() {
		//unset($_SESSION['guest_id']);	
		$this->loadView("header");
	 	$this->loadView("user_header");
	 	print_r($_SESSION);
	 	$url = explode ( "/", @$_REQUEST ['function'] );
		if (count ( $url ) > 2 ) {
			$testUrl=$url[2];
			echo $testUrl;
			$test=$this->loadModel("test","getTestId",array("link"=>"$testUrl"));
			if($test!=-1) {
				if(!(isset($_SESSION['guest_id'])) || @$_SESSION['guest_id']=="") {
					if(isset($_POST['submit']) ) {
						$this->candidateInfo();
					}
					$this->loadView('user_examiner_view/user_test_info');
				} else {
					/// all The Test Settings here :D
					if($_SESSION['question']>$_SESSION['total_question']) {
							$this->finishTest();
					} else if(($_SESSION['time']+($_SESSION['duration']*60))<time()) {
					/*For test to finish in given Duration*///TO be verified
						echo "TIMES UP";
						$this->finishTest();
					}
					else {
						$this->startTest($test);
					}
					//echo "yeah";//test start here...
				}
			} else {
				echo "Test Does Not Exisit";
			}
		} else {
			echo "NO test Selectedd";
		}
	}
	function next() {
		print_r($_POST);
		$arrArgs =array(
		 	"test_taker_id"=>$_SESSION['guest_id'],
		 	"ques_id"=>$_POST['question_id'],
		 	"answer_given"=>$_POST['coption'],
		 	"created_by"=>'1',//taken default value 
								//	must be retrived from db according to test_id
						);
		$this->loadModel("test","insertAnswer",$arrArgs);
		$_SESSION['question']+=1;
		header("location:"."http://test_scheduler.com".$_SERVER['REQUEST_URI']);
	}
	function finishTest() {
		/*call a function to give result using guest id 
		and load it to the view*/
		$this->loadView("finish_test");

	}
	function exitTest() {
			$_SESSION['guest_id']="";
			unset($_SESSION);
		header("location:".SITE_PATH);
	}

}
