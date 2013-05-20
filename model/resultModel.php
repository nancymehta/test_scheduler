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
		    $data['columns']= array('first_name','test_taker.id','test_id','last_name','start_time','end_time','score','ques_attempted','total_ques');
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
		    $data['columns']= array('first_name','test_taker.id','ip_address','email_enroll_no','last_name','start_time','end_time','score','ques_attempted','total_ques');
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
		 
		 $data = array();
				//-----------------join using cxpdo------
		 $data['tables'] = 'question';
		 $data['columns']= array('question','question_options.id','`option`','correct','answer_given');
		 $data['conditions']	= array(
		 		'test_taker_ques.test_taker_id' => $arrArgument['id']
		 );
		 $data['order_by'] = 'test_taker_ques.id';
		 $data['joins'][] = array(
		 		'table' => 'question_options',
		 		'type'	=> 'inner',
		 		'conditions' => array('question.id' => 'question_options.ques_id'));
		 
		 $data['joins'][] = array(
		 		'table' => 'test_taker_ques',
		 		'type'	=> 'inner',
		 		'conditions' => array('test_taker_ques.id' => 'question.id'));
		 
		 $result = $this->_db->select($data);
		//-----------------end of join----------------------------------------
				
		/* $result1 = $this->_db->query("select q.question,qo.option,qo.id,qo.correct,".
		 		"ttq.answer_given from question q join question_options qo on q.id=qo.ques_id ".
		 		"join test_taker_ques ttq on ttq.ques_id=q.id where ttq.test_taker_id='".$arrArgument['id']."' order by ttq.id");*/				
		 while($temp = $result->fetch(PDO::FETCH_ASSOC)){
		 	$row["question_details"][]=$temp;
		 }
		    	return $row;
	    }


	    function sendResult($arrArgument)
	    {
			 $data['tables'] = 'test_taker';
		    $data['columns']= array('first_name','test_taker.id','test_id','ip_address','email_enroll_no','last_name','start_time','end_time','score','ques_attempted','total_ques');
		    $data['conditions']	= array(
		    		'test_taker.test_id' => $arrArgument['id']);
		    $data['joins'][] = array(
		    		'table' => 'test',
		    		'type'	=> 'inner',
		    		'conditions' => array('test_taker.test_id' => 'test.id'));

		    $result = $this->_db->select($data);
		    $temp = $result->fetch(PDO::FETCH_ASSOC);
		    $end_time = new DateTime($temp['end_time']);
 			 $start_time = new DateTime($temp['start_time']);
 			 $diff_time=$end_time->diff($start_time);
		    $data_perc=($temp['score']/$temp['total_ques'])*100;

		 	  $str="";
			  $str.="                           Name of Exam Taker : ".$temp['first_name']." " .$temp['last_name']."                                               
			   "."Id  Assigned : ".$temp['id']."
			   "."Score : ". $temp['score']."/".$temp['total_ques']."
			   "."Percentage  : ". $data_perc."
			   "."Duration : ".$diff_time->format('%hh :%mm: %ss')."
			   "."Date Started  : ".$temp['start_time']."
			   "."Date Finished  : ".$temp['end_time']."
			   "."Email  : ".$temp['email_enroll_no']."
			   "."Ip Address : ".$temp['ip_address'];
			  
        	$data=array();
			$data['tables'] = 'test_taker';
		    $data['columns']= array('first_name','last_name','test_taker.id','test_id','email_enroll_no');
		    $data['conditions']	= array(
		    		'test_taker.test_id' => $arrArgument['id']
		    );

		    $result = $this->_db->select($data);
		    while($temp = $result->fetch(PDO::FETCH_ASSOC)){
					$row[]=$temp;
				}	   $row['0']['body']=$str;

			return $row;	
		}

		function sendOverallResult($arrArgument)
	    {
          $data['tables'] = 'test_taker';
		    $data['columns']= array('first_name','test_taker.id','test_id','ip_address','email_enroll_no','last_name','start_time','end_time','score','ques_attempted','total_ques');
		    $data['conditions']	= array(
		    		'test_taker.test_id' => $arrArgument['id']);
		    $data['joins'][] = array(
		    		'table' => 'test',
		    		'type'	=> 'inner',
		    		'conditions' => array('test_taker.test_id' => 'test.id'));
		    $result = $this->_db->select($data);
		    $temp = $result->fetch(PDO::FETCH_ASSOC);
		    $end_time = new DateTime($temp['end_time']);
 			 $start_time = new DateTime($temp['start_time']);
 			 $diff_time=$end_time->diff($start_time);
		    $data_perc=($temp['score']/$temp['total_ques'])*100;
		 	   $str="";
			   $str.="Name of Exam Taker : ".$temp['first_name']." " .$temp['last_name']."                                               
			   "."Id  Assigned : ".$temp['id']."
			   "."Score : ". $temp['score']."/".$temp['total_ques']."
			   "."Percentage  : ". $data_perc."
			   "."Duration : ".$diff_time->format('%hh :%mm: %ss')."
			   "."Date Started  : ".$temp['start_time']."
			   "."Date Finished  : ".$temp['end_time']."
			   "."Email  : ".$temp['email_enroll_no']."
			   "."Ip Address : ".$temp['ip_address'];
			  
        	$data=array();

			$data['tables'] = 'test_taker';
		   $data['columns']= array('first_name','last_name','test_id','test_taker.id','email_enroll_no');
		   $data['conditions']	= array(
		    		'test_taker.test_id' => $arrArgument['id']
		    );

		    $result = $this->_db->select($data);
		    while($temp = $result->fetch(PDO::FETCH_ASSOC)){
					$row[]=$temp;
					$row['body']=$str;
				}	   
			
			return $row;	
        }
 
	}
?>