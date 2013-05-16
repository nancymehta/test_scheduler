<?php 
include MODEL_PATH."db_connect.php";
class viewAllQuestionModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	
	function viewAllQuestion($arrArgs=array()){
		/**
		 *
		 * Created By : Amitesh Bharti
		 * Description : provides functionality to validate login
		 * Date_of_creation :9-5-2013
		 */
		if(isset($arrArgs)){
			
			//print_r($arrArgs);
			//find category_id using the selected dropdown list
			
			$data['tables'] = 'category';
			$data['columns']= array('id');
			$data['conditions']	= array(
					'name' => $arrArgs['category'],
					'status'=>'0',
					'created_by' => $_SESSION ['SESS_USER_ID']
			);
			$result = $this->_db->select($data);
			$row = $result->fetch(PDO::FETCH_ASSOC);
			//print_r($result);
			$category_id = $row['id'];
			//echo $category_id;
			
			// select question  using categry id  of that user.
			
			/*
			Please dont delete it without counsulting me: amitesh
			$data ['columns'] = array (
					'question'
			);
			$data ['tables'] = 'question';
			$data ['conditions'] = array (
					'question.category_id 	' => $category_id,
					'question.created_by' =>$_SESSION ['SESS_USER_ID'],
					'question.status'=>'0',
					'question_options.status'=>'0'
			);
			$data['joins'][] = array(
					'table' => ' question_options',
					'type'        => 'inner',
					'conditions' => array('question.id' => 'question_options.ques_id',
							             						               
					));
			
			*/
			$data ['columns'] = array (
					'question'
			);
			$data ['tables'] = 'question';
			$data ['conditions'] = array (
					'question.category_id 	' => $category_id,
					'question.created_by' =>$_SESSION ['SESS_USER_ID'],
					'question.status'=>'0',
					
			);
			
			
			
			
			$result = $this->_db->select ( $data );
		    return $result;
		  // print_r($result);
		  // die();
			
		
	   
		}
		
	 }
	
	
}
?>	