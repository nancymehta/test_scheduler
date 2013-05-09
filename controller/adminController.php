<?php
include SITE_ROOT.'controller/mainController.php';
class adminController extends mainController {
function mailTry() {

mailTest("shashank_ver@osscube.com","hello","test the mail");
echo "Sernt";
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
function jasleen() {
echo "SDSDSD";
}

function sendmail(){
	if($_POST['contactus']){
		$sub=$_POST['contact_name'].$_POST['contact_email'];
		$to="info.test.scheduler@gmail.com";
		$body=$_POST['contact_suggestion'];
			mailTest($to,$sub,$body);
	}
}

}
//set error handler


?>

