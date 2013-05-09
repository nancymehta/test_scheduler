<?php
include SITE_ROOT.'controller/mainController.php';
class adminController extends mainController {
function mailTry() {

mailTest("rahul00015@gmail.com","hello","test the mail");
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

}
//set error handler


?>

