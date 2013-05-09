<?php
class testuiController extends common{
	function abc() {
		echo "SDS";//$this->loadView("main_page");
	}
 function bhanu() {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");

 }
  function mytest(){
	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
	$this->loadView("user_examiner_view/maketestpage");
 }
 function category() {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/category");
  }
  function questionbank(){
  	$this->loadView("header");
  	$this->loadView("user_header");
  	$this->loadView("user_examiner_view/deshboard_menu");
  	$this->loadView("user_examiner_view/single_upload");
  
  }
  function bulk_upload(){
  	$this->loadView("header");
  	$this->loadView("user_header");
  	$this->loadView("user_examiner_view/deshboard_menu");
  	$this->loadView("user_examiner_view/bulk_upload");
  	  	
  }
  
 function suraj() {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/maketestpage");
	//$this->loadView("user_examiner_view/category");

 }
  function maketest(){
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/maketestpage");
 
 }
 function assign(){
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/category");
 	
 }
 
 function edit_test()
 {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/edit_test");
 }
}
