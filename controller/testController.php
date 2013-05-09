<?php

include SITE_ROOT.'controller/mainController.php';

class testController extends mainController {
	function candidateInfo()
	{
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
						);
		print_r($arrArgs);
		$result=$this->loadModel("test","setUser",$arrArgs);
		if($result) {
			echo "Inserted";
			echo $_SESSION['guest_id']=$result;
			header("location:".SITE_PATH."test/home/".$testUrl)	;
		}
		} else {
				echo "NO test Selectedd11";	
		}
	}
	
	function startTest()
	{
		
		$this->loadView("header");
	 	$this->loadView("user_header");
		$this->loadView('user_examiner_view/user_test_info');
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
			$testId=$this->loadModel("test","getTestId",array("link"=>"$testUrl"));
			//print_r($testId);
			//echo $_SESSION['guest_id'];
			if(!(isset($_SESSION['guest_id']))) {
				echo "nooo";
				if(isset($_POST['submit'])) {
					$this->candidateInfo();
				}
				$this->loadView('user_examiner_view/user_test_info');
			} else {
				echo "yeah";//test start here...
			}
		} else {
			echo "NO test Selectedd";
		}
	}
}
