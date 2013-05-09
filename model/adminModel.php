<?php

include MODEL_PATH."db_connect.php";
class adminModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	function usermanagement(){
		
		echo "<br><br>hi";
		$data['tables'] = 'validate_users';
		$data['columns']= array('username');
		$data['conditions']= array(
					'status' => 0['username']
					);
			//$data['joins']   =  array();
			$result = $this->_db->select($data);
	
			$row = $result->fetch(PDO::FETCH_ASSOC);
		
	}
}
?>
