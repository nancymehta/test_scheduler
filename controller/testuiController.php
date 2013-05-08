<?php
class testuiController extends common{
	function abc() {
		echo "SDS";//$this->loadView("main_page");
	}
 function category() {
 	$this->loadView("header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/category");
 }
 function bhanu() {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");

 }
 function suraj() {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");

 	$this->loadView("user_examiner_view/maketestpage");
	//$this->loadView("user_examiner_view/category");

 }
}
