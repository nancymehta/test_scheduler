<?php 

include MODEL_PATH."db_connect.php";
class baseModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	function login($dataFromUser) {
		
		$arrUser[]=array();
		$data['tables'] = 'validate_users';
		$data['columns']= array('username','password','session_id');
		$data['conditions']	= array(
								'username' => $dataFromUser['username'],
								'password' => $dataFromUser['password']
								);
		$result = $this->_db->select($data);
		
		$row = $result->fetch(PDO::FETCH_ASSOC);
		
		//In case of success
		if ($row)
		{
			//session_start();
			var_dump(session_id);die;
			if ($row['session_id'] != 0)
			{
				$data= array(
						"session_id"=>"df"
				);
			}
			
			
		}
		
		
		return $row;         
	}
	
	function register() {
	echo "Register";
	}
	
	function faq()
	{
		loadView('faq.php');
	}
} 