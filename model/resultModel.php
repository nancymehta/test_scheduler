<?php 
include MODEL_PATH."db_connect.php";
class resultModel extends dbConnectModel {
	function __construct() {
		parent::__construct();
	}
	
	function populateDropDown(){
		    
		    $data['tables'] = 'test';
		    $data['columns']= array('test.id','name');
		    $data['conditions']	= array(
		    		'test.created_by' => $_SESSION ['SESS_USER_ID']
		    );
		    $data['joins'][] = array(
	'table' => 'validate_users', 
	'type'	=> 'inner',
	'conditions' => array('validate_users.id' => 'test.created_by')
);
		    $result = $this->_db->select($data);

		    while($temp = $result->fetch(PDO::FETCH_ASSOC)){
					$row[]=$temp;
		    	return $row;
		    }
		   
		}


		function overAllResults($arrArgument){
			$data['tables'] = 'test_taker';
		    $data['columns']= array('first_name','test_taker.id','last_name','start_time','end_time','score','ques_attempted','total_ques');
		    $data['conditions']	= array(
		    		'test_taker.test_id' => $arrArgument['testid']
		    );
		    $data['joins'][] = array(
	'table' => 'test', 
	'type'	=> 'inner',
	'conditions' => array('test_taker.test_id' => 'test.id')
);
		    $result = $this->_db->select($data);



		    while($temp = $result->fetch(PDO::FETCH_ASSOC)){
					$row[]=$temp;
				}	   
return $row;		}

	function individualResults($arrArgument)
		{
			$data['tables'] = 'test_taker';
		    $data['columns']= array('first_name','test_taker.id','ip_address','last_name','start_time','end_time','score','ques_attempted','total_ques');
		    $data['conditions']	= array(
		    		'test_taker.id' => $arrArgument['id']
		    );
		    $data['joins'][] = array(
		    		'table' => 'test',
		    		'type'	=> 'inner',
		    		'conditions' => array('test_taker.test_id' => 'test.id'));
		    $result = $this->_db->select($data);
   
		 while($temp = $result->fetch(PDO::FETCH_ASSOC)){
		 	$row["test_taker_details"][]=$temp;
		 }
				
		//-----------------
				
		 $result1 = $this->_db->query('select q.question,qo.option,qo.correct,ttq.answer_given from question q join question_options qo on q.id=qo.ques_id join test_taker_ques ttq on ttq.ques_id=q.id where ttq.test_taker_id="1"');
				
		 while($temp = $result1->fetch(PDO::FETCH_ASSOC)){
		 	$row["question_details"][]=$temp;
		 }
		    	return $row;
	    }

	
	}
?>