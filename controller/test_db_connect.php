<?php 
class test_db_connectController extends common{
function test_main()
	{
	//$this->loadModel("db_connect","test_model");
	$this->loadModel('db_connect','test_model');
	$this->loadView("test_db_connect.php");
		
	}
}
