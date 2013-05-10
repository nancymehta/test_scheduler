<?php
include MODEL_PATH."db_connect.php";
class adminModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	
		function contactUs($arrArgument){
			$name=$arrArgument['name'];
			$email=$arrArgument['email'];
			$body=$arrArgument['body'];
			$data=array(
					"name"=>$name,
					"email"=>$email,
					"description"=>$body,
					);
			$result = $this->_db->insert('contact_us',$data);
	
		}
	
	function usermanagement(){
		$userResult=array();
		echo "<br><br>";
		$data['tables'] = 'validate_users';
		$data['columns']= array(
					'id',
					'username'
					);
		$data['conditions']= array(
					'status' => '0',
					'user_type' => 1,
					);
			$result = $this->_db->select($data);
	
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
				$userResult[]=$row;
			}

		return $userResult;			
		
	}
	function showUserDetails($id){
		$userResult=array();
		echo "<br><br>";
		
		$data['columns'] = array(
					'validate_users.id',
					'validate_users.username',
					'validate_users.password',
					'validate_users.user_type',
					'user_profile.first_name',
					'user_profile.last_name',
					'user_profile.email',
					'master.code_value'
					);
		$data['tables'] = 'validate_users';
		$data['joins'][] = array(
					'table' => 'user_profile', 
					'type'	=> '',
					'conditions' => array('validate_users.id' => 'user_profile.user_id')
					);
		$data['joins'][] = array(
					'table' => 'master', 
					'type'	=> '',
					'conditions' => array('master.id' => 'user_profile.type_of_org_id')
					);
			$data['conditions'] = array('validate_users.id' => $id,
							);
			$result = $this->_db->select($data);
            
			while ($row = $result->fetch(PDO::FETCH_ASSOC)){ 
            			$userResult[]=$row;
            		}
				
			$data1['columns'] = array(
						'code_value',
					);
			$data1['tables'] = 'master';

			$data1['conditions'] = array('code_type' => 'type_of_org',
							);
			$result1 = $this->_db->select($data1);
            
			while ($row1 = $result1->fetch(PDO::FETCH_ASSOC)){ 
            			$userResult['org_type'][]=$row1['code_value'];
            		}
			
			return $userResult;
		
		
	}

	function editUserDetails($editData){
		$userResult=array();
		$data['tables'] = 'master';
		$data['columns']= array(
					'id',
					);
		$data['conditions']= array(
					'code_value' => $editData['org_type'],
					);
		$result = $this->_db->select($data);
		$row = $result->fetch(PDO::FETCH_ASSOC);
				
		$udata1['conditions'] = array('user_id'=> $editData['id']);	   
		$update_row1[] = array(
					'first_name' => $editData['first_name'],
					'last_name' => $editData['last_name'],
					'email' => $editData['email'],
					'type_of_org_id' => $row['id'],
					
					);
            	foreach($update_row1 as $row1) 
			{		
				$uresult = $this->_db->update('user_profile',$row1,$udata1['conditions']);
			}	
			
		$udata2['conditions'] = array('id'=> $editData['id']);	   
		$update_row2[] = array(
					'username' => $editData['username'],
					'password' => $editData['password'],
					'user_type' => $editData['user_type'],
					);
            	foreach($update_row2 as $row2) 
			{		
				$uresult = $this->_db->update('validate_users',$row2,$udata2['conditions']);
			}		
	}

	function deleteUser($id){
		$userResult=array();
		$data['conditions'] = array('id'=> $id);	   
		$update_row[] = array('status' => '1',
					);
            	foreach($update_row as $row) 
			{		
				$result = $this->_db->update('validate_users',$row,$data['conditions']);
			}	
		
	}
		
	function feedbackManagementModel(){
		$feedbackResult=array();
		$data['tables'] = 'contact_us';
		$data['columns']= array('id','name','email','description');
		$result=$this->_db->select($data);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$feedbackResult[]=$row;
			
		}
		return $feedbackResult;
	}
	
	function fetchFeedEmail($id){
		$data['tables']= 'contact_us';
		$data['columns']= array( 'email' );
		$data['conditions']=array( 'id'=> $id);
		$result=$this->_db->select($data);
		if($row = $result->fetch(PDO::FETCH_ASSOC)){
			return $row['email'];
		}
		else{
			return 0;
		}	
	}
}
?>