<?php 

include MODEL_PATH."db_connect.php";
class baseModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	function login($dataFromUser) {
		$arrUser[]=array();
		$data['tables'] = 'validate_users';
		$data['columns']= array('username','password');
		$data['conditions']	= array(
								'username' => $dataFromUser[''],
								'password' => $dataFromUser
		);
		$result = $this->_db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$arrUser[]=$row;
		
		}
		return $arrUser;         
	}
	
	function register() {
	echo "Register";
	}
	
} 