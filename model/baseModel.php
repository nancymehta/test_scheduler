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
		/**
		 *
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to validate login
		 * Date_of_creation :9-5-2013
		 */
		/* this method is intended to check the login activity of authorized user*/
		if(!empty($arrArgs)){
			$arrUser[]=array();
			$data['tables'] = 'validate_users';
			$data['columns']= array('username','id','password','session_id','user_type','status');
			$data['conditions']	= array(
									'username' => $arrArgs['username'],
									'password' => $arrArgs['password'],
									);
			$result = $this->_db->select($data);
			
			$row = $result->fetch(PDO::FETCH_ASSOC);
			print_r($row);
			 if ($row)	{
				 if($row['status']== 0){
					$data= array("session_id"=> session_id());
					$where = array('username'=>$arrArgs['username']);
					$result = $this->_db->update('validate_users',$data,$where);
					//~ var_dump($result);die;
					if($result) {
						print_r($result);
						$_SESSION['SESS_USER_NAME']= $row['username'];
						$_SESSION['SESS_USER_ID']= $row['id'];
						$_SESSION['SESS_USER_TYPE']= $row['user_type'];
						return 1;
					}
					else {
						return 0;
					} 
				} 
				else {
					return 0;
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
			$count=0;
		//print_r($arrArgs);//die();
			$ip= $_SERVER['REMOTE_ADDR'];
			
			$data['tables'] = 'user_profile';
			$data['columns']= array('ip_address');
			$datax	= array(
					'ip_address' => $ip
					
						);
			$result = $this->_db->count('user_profile',$datax);
			
			$count=$result->fetchColumn();
			//echo $count;
			
			if($count<10)
			{
				$data1=array(
				"username"=>$arrArgs['username'],
				"password"=>$arrArgs['password']);
		
		                
				$result1 = $this->_db->insert('validate_users', $data1);
		                 
		
				$user_id=$this->_db->lastInsertId();
				$ip= $_SERVER['REMOTE_ADDR'];
				//$datetime =date("d/m/y h:i:s");
				$data2=array(
					"user_id"=>$user_id,
					"first_name"=>$arrArgs['firstName'],
					"last_name"=>$arrArgs['lastName'],
					"email"=>$arrArgs['email'],
					"type_of_org_id"=>4,
					"created_on"=>'now()',
					"ip_address"=>$ip
					);
		
		$result2 = $this->_db->insert('user_profile', $data2);
		if($result1 && $result2)
		{
			return 1;
			}
		  }else{
			return 0;
			}

	}
	else {
	  return 0;
	}		
	}
	function fetchTests() {
		$data['tables']="test";
		$data['columns']=array("id","name","created_on");
		$data['conditions']=array("status"=>"0",
								  "created_by"=>$_SESSION['SESS_USER_ID']);
		$result=$this->_db->select($data);
		$row=array();
		while($temp=$result->fetch(PDO::FETCH_ASSOC)) {
			$row[]=$temp;
		}
		return $row;
	}
	
	function insert_log($type){
		$ip= $_SERVER['REMOTE_ADDR'];
		$user_id=$_SESSION['SESS_USER_ID'];
		$data1['tables'] = 'master';
		$data1['columns']= array(
					'id',
					);
		$data1['conditions']= array(
					'code_type' => 'activity_log_type',
					'code_value' => $type,
					);
		$result1 = $this->_db->select($data1);
		$row1 = $result1->fetch(PDO::FETCH_ASSOC);
		
		$data2=array(
				"user_id" => $user_id,
				"type" => $row1['id'],
				"ip_address" => $ip,
				);
		$result2 = $this->_db->insert('activity_log',$data2);
		return $result2;
		
		
	}
} 

