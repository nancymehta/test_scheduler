<?php

ini_set("display_errors","1");
session_start ();
ob_start ();
require_once($_SERVER['DOCUMENT_ROOT'].'/test_scheduler/trunk/library/constant.path.php');
require_once(LIBRARY_ROOT.'common.inc.php');
require_once(LANGUAGE_ROOT.'lang.en.php');
require_once(CONFIG_ROOT.'constants.php'); 


if(PHASE=="Development" || PHASE=="Testing"){
	ini_set("display_errors","1");
	
}
else{
	ini_set("display_errors","0");
}

if(isset($_REQUEST['controller']) && !empty($_REQUEST['controller'])){
	$controller =$_REQUEST['controller'];
}
else{
	$controller ='main';  //default controller
}
if(isset($_REQUEST['function']) && !empty($_REQUEST['function'])){
	$function =$_REQUEST['function'];
	$url = explode ( "/", @$_REQUEST ['function'] );
	if (count ( $url ) > 1) {
		$controller = $url [0];
		$function = $url [1];
	}	
}
else{
	$function ='home';    //default function
}

//$controller = strtolower ( $controller );
$fn = SITE_ROOT.'controller/'.$controller.'Controller.php';

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

ob_flush();
?>
