<?php 
/**
 * Filename : baseModel.php
 * Created By : Amitesh Bharti
 * Description : provides base work for users like login to database
 * Date_of_creation :6-5-2013
 */
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
	/*Created By : DEEPIKA SOLANKI
	 * */
	function fetchQuestionFeedback($id) {
		$data['tables']="test_taker_ques";
		$data['columns']=array("test_taker_ques.id","test_taker_ques.test_taker_id","test_taker. first_name","test_taker.last_name","test_taker_ques.ques_id","test_taker_ques.feedback");
		$data['joins'][] = array(
				'table' => 'test_taker',
				'type'        => 'right',
				'conditions' => array('test_taker_ques.test_taker_id' => 'test_taker.id')
		);
		$data['conditions']=array('test_taker.test_id'=>$id);
		
		$result=$this->_db->select($data);
		$row=array();
		while($temp=$result->fetch(PDO::FETCH_ASSOC)) {
			$row[]=$temp;
		}
// 		if(!empty($row['feedback'])) {
		return $row;
// 		}
	}
	/*Created By : DEEPIKA SOLANKI
	 * */
	function fetchAllTest() {
		$data['tables']="test";
		$data['columns']=array("id","name","created_on");
		$data['conditions']=array("status"=>"0");
		$result=$this->_db->select($data);
		$row=array();
		while($temp=$result->fetch(PDO::FETCH_ASSOC)) {
			$row[]=$temp;
		}
		return $row;
	}
	
	function check_forget_email($email){
		$data['tables']="user_profile";
		$data['columns']=array("id","email");
		$data['conditions']=array("email"=>$email);
		$result=$this->_db->select($data);
		$row=array();
		while($temp=$result->fetch(PDO::FETCH_ASSOC)) {
			$row[]=$temp;
		}
		return $row;
	}

	function insertToken($email){
		$data['tables']="user_profile";
		$data['columns']=array("user_id","email");
		$data['conditions']=array("email"=>$email);
		$result=$this->_db->select($data);
		if($temp=$result->fetch(PDO::FETCH_ASSOC)){
			$id=$temp['user_id'];
			$validCharacters = "ABCDEFGHIJKLMNPQRSTUXYVWZ123456789";
    			$validCharNumber = strlen($validCharacters);
    			$result1 = "";
 			for ($i = 0; $i < 10; $i++) {
        			$index = mt_rand(0, $validCharNumber - 1);
        			$result1 .= $validCharacters[$index];
    			}
			$data1=array(	
				"token"=>$result1,
				"used"=>0
				);
			 $where = array('id' => $id);
			$result2 = $this->_db->update('validate_users',$data1,$where);
		return $result1;	
		}
		else{
		return 0;
		}
	}
	
	function fetchEmail($token){
		$data=array();
		$data['tables']= 'validate_users';
		$data['columns']= array('user_profile.email','validate_users.token','validate_users.used'	);
		$data['conditions']= array(
							'validate_users.token' => $token,
							'validate_users.used'=>0
								);
		$data['joins'][] = array(
							'table' => 'user_profile',
							'type'	=> 'inner',
							'conditions' => array(
									'user_profile.user_id' => 'validate_users.id')
		);
		$result = $this->_db->select($data);
		while($row=$result->fetch(PDO::FETCH_ASSOC)){
			$email=$row['email'];
		}
		If ($email!=''){
			$_SESSION['email']=$email;
			return 1;
		}
	}
	
	function updatePassword($password){
		$data['tables']= 'user_profile';
		$data['columns']= array('user_id');
		$data['conditions']= array(
				'email' => $_SESSION['email']
		);
		$result1=$this->_db->select($data);
		while($row=$result1->fetch(PDO::FETCH_ASSOC)){
			$data=array(
					"password"=>$password
				);
			$where = array('id' => $row['user_id']);
			$result = $this->_db->update('validate_users',$data,$where);
			if($result){
				$data1=array(
						"used"=>1
						);
			//	$where = array('id' => $row['user_id']);
				$result = $this->_db->update('validate_users',$data1,$where);
				return 1;
			}
			else{
				return 0;
			}
		}
	}
} 
?>