<?php

/**
 * @classname            accountSettingsModel
 *
 * This class is used to manage the Account of users.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */

ini_set("display_errors","1");
include MODEL_PATH."db_connect.php";
class accountSettingsModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	
	//Gettings the values of the user
	function viewDetails($userId) {
	try {
		$data['tables']		=	'user_profile';
		$data['columns']	=	'user_profile.first_name,user_profile.last_name,user_profile.email,validate_users.username';
		$data['joins']		=	null;
		
		
		$data['joins'][]	=	array('table'=>'validate_users',
						      'type'=>'inner',
						      'conditions'=>array('user_profile.user_id'=>'validate_users.id')
						     );
		$data['conditions']	=	array('user_profile.user_id'=>$userId);
		
		$result			=	$this->_db->select($data);
		while($row		=	$result->fetch(PDO::FETCH_ASSOC))
		{
			$userData['firstname']	=	$row['first_name'];
			$userData['lastname']	=	$row['last_name'];
			$userData['email']	=	$row['email'];
			$userData['username']	=	$row['username'];
		}
		return $userData;
   	
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//Getting the values for the user for editing 
	function editDetails($userId) {
	try {
		$data['tables']		=	'user_profile';
		$data['columns']	=	array('first_name','last_name','email');
		$data['conditions']	=	array('user_id'=>$userId);
		
		$result			=	$this->_db->select($data);
		while($row		=	$result->fetch(PDO::FETCH_ASSOC))
		{
			$arrData['fname']	=	$row['first_name'];
			$arrData['lname']	=	$row['last_name'];
			$arrData['email']	=	$row['email'];
		}
		return $arrData;
   	
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//Updating the edited values of the user
	function processDetails($userData) {
	try {
		$fname	=	$userData['fname'];
		$lname	=	$userData['lname'];
		$email	=	$userData['email'];
		$userId	=	$userData['id'];
		
		$data['tables']		=	'user_profile';
		$data['columns']	=	array('user_profile.first_name'=>$fname,'user_profile.last_name'=>$lname,'user_profile.email'=>$email);
		$data['conditions']	=	array('user_profile.user_id'=>$userId);
		
		$result			=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		if($result)
		{
			return true;
		}else{
			return false;
		}
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	/*
	 *Checking that if the old Password is correct or not.
	 *If old password is correct the updates the new Password.
	 */
	
	function confirmChangePassword($arrData) {
	try {
		$password			=	$arrData['newPass'];
		$oldPassword			=	$arrData['oldPass'];
		$userId			=	$arrData['id'];
		$data['tables']			=	'validate_users';
		$data['columns']		=	array('password');
		$data['conditions']		=	array('id'=>$userId);
		$result				=	$this->_db->select($data);
		$row				=	$result->fetch(PDO::FETCH_ASSOC);
		if($row['password']		==	$oldPassword)
		{
		$data['table']			=	'validate_users';
		$data['columns']		=	array('password'=>$password);
		$data['conditions']		=	array('id'=>$userId);
		$result				=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		
		if($result)
		{
			return true;
		}
		}else{
			return false;
		}
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//Deactivating the account of the user
	function deactivateAccount($userId) {
	try {
		$data['tables']			=	'validate_users';
		$data['columns']		=	array('status'=>0);
		$data['conditions']		=	array('id'=>$userId);
		
		$result				=	$this->_db->update($data['tables'],$data['columns'],$data['conditions']);
		if($result)
		{
			return true;
		}
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
//created by jasleen
	function viewLog($type){
		$arrLog=array();
		$userId=$_SESSION['SESS_USER_ID'];
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
		$data2['tables'] = 'activity_log';
		$data2['columns']= array(
					'ip_address',
					'time',
					);
		$data2['conditions']= array(
					'user_id' => $userId,
					'type' => $row1['id'],
					);
		$result2 = $this->_db->select($data2);
		while($row2 = $result2->fetch(PDO::FETCH_ASSOC)){
			$arrLog[]=$row2;
		}
		return $arrLog;
	}



	
}
?>
