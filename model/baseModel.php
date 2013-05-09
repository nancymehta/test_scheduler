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
		/* this method is intended to check the login activity of authorized user*/
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
				print_r($row);
				$_SESSION['SESS_USER_NAME']= $row['username'];
				$_SESSION['SESS_USER_ID']= $row['id'];
				echo "--->".$_SESSION['SESS_USER_TYPE']= $row['user_type'];
				
				//session_start();
				$data= array(
						"session_id"=> session_id(),
					   );
				$where = array('username'=>$arrArgs['username']);
				$result = $this->_db->update('validate_users',$data);
				if($result)
				{
					die('You are logged in now');
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
	
	function register($arrArgs) {
		if(!empty($arrArgs))
		{
		//print_r($arrArgs);//die();
		$data1=array(
				"username"=>$arrArgs['username'],
				"password"=>$arrArgs['password']);
		
		
		$result1 = $this->_db->insert('validate_users', $data1);
		
		
		  $user_id=$this->_db->lastInsertId();
		  $ip= $_SERVER['REMOTE_ADDR'];
		
		$data2=array(
				"user_id"=>$user_id,
				"first_name"=>$arrArgs['firstName'],
				"last_name"=>$arrArgs['lastName'],
				"email"=>$arrArgs['email'],
				"type_of_org_id"=>4,
				"ip_address"=>$ip);
		
		$result2 = $this->_db->insert('user_profile', $data2);
		if($result1 && $result2)
		{
			return 1;
		}
		else
		{
			return 0;
		}

		}
	}
		
	function getCategory($arrData=array()){
		print_r($arrData);
	}
	
	
	function faq()
	{
		$this->loadView('faq.php');
	}
} 