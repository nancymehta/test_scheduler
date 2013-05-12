<?php
include SITE_ROOT.'controller/mainController.php';
class adminController extends mainController {
function mailTry() {

mailTest("shashank_ver@osscube.com","hello","test the mail");
echo "Sent";
}
//error handler function
function testmail() {
	$this->loadView("header");
	$this->loadView("mailer");
}
function abc() {
	set_error_handler("customError",E_USER_WARNING);
	error_log("Sdsdsd");
	//trigger error
	$test=2;
	if ($test>1)
	  {
	  trigger_error("Value must be 1 or below",E_USER_WARNING);
	  }
	}
function sendmail(){
	if($_POST['contactus']){
		$sub=$_POST['contact_name']." <-name   email-> ".$_POST['contact_email'];
		$to="info.test.scheduler@gmail.com";
		$body=$_POST['contact_suggestion'];
		$name=$_POST['contact_name'];
		$email=$_POST['contact_email'];
		mailTest($to,$sub,$body);
		$arrArgument=array('name'=>$name,'email'=>$email,'body'=>$body);
		$this->loadModel("admin","contactUs",$arrArgument);
	}
}
function home() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "admin_view/admin_deshboard_menu" );	
		$this->loadView ( "admin_view/admin_home" );
}
function usermanagement() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "admin_view/admin_deshboard_menu" );
		$userResult=$this->loadModel ( "admin","usermanagement");
		$this->loadView ( "admin_view/usermanagement",$userResult);
}
function showUserDetails() {
	if(isset($_POST['id']) && isset($_POST['request'])){
		if($_POST['request']=='EDIT'){
			$userResult=$this->loadModel ( "admin","showUserDetails",$_POST['id']);
$this->loadView ( "admin_view/showUserDetails",$userResult);
		}else if($_POST['request']=='DELETE'){
				$userResult=$this->loadModel ( "admin","deleteUser",$_POST['id']);
			}
	}
}
function editUserDetails() {
	print_r($_POST);
	if(isset($_POST)){
		$userResult=$this->loadModel ( "admin","editUserDetails",$_POST);
	}	
}

function testmanagement() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "admin_view/admin_deshboard_menu" );
		$arrArgs=$this->loadModel("admin","fetchTests");
		$this->loadView ( "admin_view/testmanagement",$arrArgs );
}
function feedbackmanagement() {
		$this->loadView ( "header" );
		$this->loadView ( "user_header" );
		$this->loadView ( "admin_view/admin_deshboard_menu" );
		$result=$this->loadModel( "admin","feedbackManagementModel" );
		$this->loadView ( "admin_view/feedbackmanagement",$result );
		
}

function adminMailSend(){
		$id=$_POST['id'];
		$body=$_POST['body'];
		$result=$this->loadModel( "admin","fetchFeedEmail",$id );
		if($result)
		{
			mailTest($result,'info.test.scheduler@gmail.com',$body);
		}
		else{
			return 0;
		}
}
	function deleteTest() {
		$result=$this->loadModel("admin","deleteTest",array("id"=>$_REQUEST['id']));
		if($result) {
			echo "DELETED";
		}
	}
	function fetchTestContents() {
		
		$arrArgs=$this->loadModel("admin","fetchTestContent",array("id"=>$_REQUEST['id']));
		$this->loadView("admin_view/testContent",$arrArgs);
	}
}
//set error handler


?>