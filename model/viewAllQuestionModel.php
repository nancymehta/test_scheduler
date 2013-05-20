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
			if(!isset($_SESSION['SESSION_ERROR'])){
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
		    }
		    else{
			    $category_id = $arrArgs['category'];	
			}
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
					'question','id','category_id'
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
	 
	 public function deleteQues($arrArgs=array()) {
	   // print_r($arrArgs);
	       if(isset($arrArgs)){
				$qid=$arrArgs['qid'];
				//die('oye model');
				$data = array('status' => '1');
				$where = array('id' => $qid);
				$result =  $this->_db->update('question', $data, $where);
				if($result){
					return 1;  
					
					}
		    }
	   	 }
		public function editQues($arrArgs) {
	       $data ['columns'] = array (
				'id',
				'question',
				'category_id',
						);
		$data ['tables'] = "question";
		$data ['conditions'] = array (
				"id" => $arrArgs['id']
		);
		
		$result = $this->_db->select ( $data );
		$result1 = $result->fetchAll();
		//print '<pre>';
		//print_r($result1);
		$arrArgs['question']=$result1[0]['question'];
		
		//~ /*   selecting respective question option  */
		
		//print_r($arrArgs);
		
		$data ['columns'] = array (
				'id','`option`','correct'
			);
		$data ['tables'] = "question_options";
		$data ['conditions'] = array (
				"status"=>'0',
				"ques_id" => $arrArgs['id']
		);
		
		$results = $this->_db->select ( $data );
		$result2 = $results->fetchAll();
		print '<pre>';
		//print_r($result2);
		//die();
		  $i=0;
		  while ( (!empty($result2[$i]['option'] ))){
			$option['id'][] = $result2[$i]['id'];
			$option['option'][] = $result2[$i]['option'];

			
			if($result2[$i]['correct']=='1'){
				
				$answer['id'][]=$result2[$i]['id'];
				$answer['option'][]=$result2[$i]['option'];

				
				}
			$i++;
			}
			
		$arrArgs['option']=$option;	
		$arrArgs['answer']=$answer;	
		//print_r($option);	
		//print_r($answer);
		//print_r($arrArgs);
		//die();
		return $arrArgs;
	
	   }
	   
	    public function quesUpdate($arrArgs){
		         print_r($arrArgs);	
		         if(isset($arrArgs)){
					$qid=$arrArgs['qid'];
				    $question=$arrArgs['question'];
					//die('oye model');
					$data = array('question' => $question);
					$where = array('id' => $qid);
					$result1 =  $this->_db->update('question', $data, $where);
					
					/** setting correctness of all option to incorrect **/
					
					$data = array('correct' => '0');
					$where = array('ques_id' => $qid);
					//$result2 =  $this->_db->update('question_options', $data, $where);
					
					
										
					
					
					//if($result1 && $result2){
						return 1;  
						
						//}
		          }
		          
		   }  
			
		
}
?>	
