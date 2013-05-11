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
 	//$this->loadView("user_examiner_view/maketestpage");
  $this->loadView("user_examiner_view/manage_test");


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
 function gg(){
 	$this->loadView("header");
 	$this->loadView("user_header");
 	
 	echo "<table class=table1><thead><tr><th>adsdsd</th></tr></thead>
 			<tbody><tr><td>ashdfajhsd</td></tr><tr><td>ashdfajhsd</td></tr><tr><td>ashdfajhsd</td></tr></tbody>
 			
 			</table>";
 }
 
 
 function recent_result()
 {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/recent_result");
 }

 function result_by_group()
 {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/result_by_group");
 }
 
 function result_by_test()
 {
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/result_by_test");
 }
 function certif(){
 	$this->loadView("header");
 	$this->loadView("user_header");
 	$this->loadView("user_examiner_view/deshboard_menu");
 	$this->loadView("user_examiner_view/manageCertificate");
 }
}
