<?php 
/**
 * Filename : baseModel.php
 * Created By : Amitesh Bharti
 * Description : provides base work for users like login to database
 * Date_of_creation :6-5-2013
 */
//ini_set('display_errors','1');
include MODEL_PATH."db_connect.php";
class baseModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	function login($arrArgs=array()) {
		if(!empty($arrArgs)){
			//print_r($arrArgs);
			//die('fsdfffs');

		    $arrUser[]=array();
			$data['tables'] = 'validate_users';
			$data['columns']= array('username','id','password','session_id','user_type');
			$data['conditions']	= array(
									'username' => $arrArgs['username'],
									'password' => $arrArgs['password']
									);
			//$data['joins']   =  array();
			$result = $this->_db->select($data);
	
			$row = $result->fetch(PDO::FETCH_ASSOC);
			
		//In case of success
		    if ($row)
			{
				$_SESSION['SESS_USER_NAME']= $row['username'];
				$_SESSION['SESS_USER_ID']= $row['id'];
				$_SESSION['SESS_USER_TYPE']= $row['user_type'];
				//session_start();
				$data= array(
						"session_id"=> session_id(),
					   );
				$where = array('username'=>$arrArgs['username']);
				$result = $this->_db->update('validate_users',$data);
				if($result)
				{
					//die('You are logged in now');
					return 1;
				}
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