<?php 

include MODEL_PATH."db_connect.php";
class baseModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	function login() {
		$arrUser[]=array();
		$data['tables'] = 'validate_users';
		$data['columns']= array('username','password');
		$data['conditions']	= array('username' => 'nancy');
		           
		            $result = $this->_db->select($data);
		            while($row = $result->fetch(PDO::FETCH_ASSOC)){
		                $arrUser[]=$row;
						//die($row);
		            }
		   return $arrUser;         
	}
	
	function register() {
	echo "Register";
	}
	
} 