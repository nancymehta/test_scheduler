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
			$_SESSION['SESS_USER_NAME']= $row['username'];
			//session_start();
			$data= array(
					"session_id"=> session_id()
					);
			$where = array('username'=>$dataFromUser['username']);
			$result = $this->_db->update('validate_users',$data);
			if($result)
			{
				echo 'You are logged in now';
			}
		}       
	}
	
	function singleLoginLogic()
	{
		//print_r($_SESSION);
		$data['tables'] = 'validate_users';
		$data['columns']= array('session_id');
		$data['conditions']	= array(
				'username' => $_SESSION['SESS_USER_NAME']
		);
		$result = $this->_db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
		if (session_id() != $row['session_id'])
		{
			return 1;
		}
	}
	
	function register() {
		echo "Register";
	}
	
	function faq()
	{
		$this->loadView('faq.php');
	}
} 