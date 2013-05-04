<?php 
if(PHASE=="Development" || PHASE=="Testing"){
	ini_set("display_errors","1");
}
else{
	ini_set("display_errors","0");
}
session_start();
//require_once('././config/constants.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/test_scheduler/library/common.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/test_scheduler/classes/common.class.php');

if(isset($_REQUEST['controller']) && !empty($_REQUEST['controller'])){
	$controller =$_REQUEST['controller'];
}
else{
	$controller ='index';  //default controller
}
if(isset($_REQUEST['function']) && !empty($_REQUEST['function'])){
	$function =$_REQUEST['function'];
	 
}
else{
	$function ='fncLandingPage';    //default function

}

//$controller=strtolower($controller);
$fn = SITE_ROOT.'controller/'.$controller.'.php';
if(file_exists($fn)){
	require_once($fn);
	$controllerClass=$controller.'Controller';
	if(!method_exists($controllerClass,$function)){
		die($function .' function not found');
	}
	$obj=new $controllerClass;
	$obj-> $function();
}
else{
	die($controller .' controller not found');
}
?>
