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
}
