<?php
	include MODEL_PATH."db_connect.php";
class testModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	/*return the testID according to link*/
	function getTestId($arrArgs=array()) {
		//write a quesry to get test id and test link id according to test_url
		$data['tables']="test_link";
		$data['columns']=array("id as test_link_id","test_id");
		$data['conditions']=array("link"=>$arrArgs['link']);
		$result = $this->_db->select($data);
		if($result) {
			$row	=	$result->fetch(PDO::FETCH_ASSOC);
			if(!empty($row)) {
				print_r($row);
				return $row;
			} else {
				return -1;
			}
		} else {
				return -1;
		}
		//return array("test_id"=>1,"test_link_id"=>1);
	}
	function setUser($arrArgs=array()) {
		if(!empty($arrArgs)) {
			$result=$this->_db->insert("test_taker",$arrArgs);
			if($result->rowCount()>0) {
				return $this->_db->lastInsertId();
			} else {
				return 0;
			}
		}
	}
	function fetchTestDetails($arrArgs=array()) {
		$testId=$arrArgs['test_id'];
		$data['tables']="test_link";
		$data['conditions']=array("test_id"=>"$testId");
		$result = $this->_db->select($data);
		$row1	=	$result->fetch(PDO::FETCH_ASSOC);
		//fetching questions
		$_SESSION['jj']=($arrArgs);
		$data['tables']="test_question";
		$data['conditions']=array("test_id"=>"$testId");
		$data['columns']=array("question_id");
		$result2 = $this->_db->select($data);
		$ques=array();
		while($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
			array_push($ques,$row2['question_id']);
		}
		$row=array("details"=>$row1,
					"questions"=>$ques
					);
		return ($row);
	}
	//
	function fetchQuestions($arrArgs=array()) {
		echo("<pre>");
		$data['tables']="test_question tq";
		$data['columns']=array('q.question','tq.question_id','q.ques_type_id');
		$data['conditions']=array("tq.test_id"=>$arrArgs['test_id']);
		$data['joins'][] = array(
		'table' => 'question q', 
		'type'	=> 'inner',
		'conditions' => array('q.id' => 'tq.question_id'));
	/*	$data['joins'][] = array(
		'table' => 'question_options qo', 
		'type'	=> 'inner',
		'conditions' => array('q.id' => 'qo.ques_id'));*/
		$row=array();
		$result = $this->_db->select($data);
		while($row1	=	$result->fetch(PDO::FETCH_ASSOC)){
			$data1['tables']="question_options q";
			$data1['columns']=array('q.option','q.id');
			$data1['conditions']=array("q.ques_id"=>$row1['question_id']);
			$result2 = $this->_db->select($data1);
			$row3=array();
			while($row2[]	=	$result2->fetch(PDO::FETCH_ASSOC)){
				
			}
			$row[$row1['question_id']]=$row1;
			$row[$row1['question_id']."opt"]=($row2);
			$row2=array();
		};	
		return $row;
	}
	function insertAnswer($arrArgs=array()) {
		echo "s";
		if(!empty($arrArgs)) {
			$data['tables']="test_taker_ques";
			$data['columns']=array("id");
			$data['conditions']=array(
							"test_taker_id"=>$arrArgs["test_taker_id"],
		 					"ques_id"=>$arrArgs["ques_id"]);
			$result2 = $this->_db->select($data);
			$row=$result2->fetch(PDO::FETCH_ASSOC);
			$_SESSION['cc']=$row;
			if($row) {
				$_SESSION['kk']=$row;
				$answer=array("answer_given"=>$arrArgs['answer_given']);
				$result=$this->_db->update("test_taker_ques",$answer,array("id"=>$row['id']));
				if($result->rowCount()>0) {
						echo "updated";
						return $this->_db->lastInsertId();
					} else {
						echo "OOPSerted";
						return 0;
					}	
			} else {
				$_SESSION['kk']="no";
				$_SESSION['kk']="insert";
					$result=$this->_db->insert("test_taker_ques",$arrArgs);
					if($result->rowCount()>0) {
						echo "inserted";
						return $this->_db->lastInsertId();
					} else {
						echo "OOPSerted";
						return 0;
					}		
			}
				
			



			
		}
	}
	function fetchAttemptedQuestions($arrArgs=array()) {
		if(!empty($arrArgs)) {
		$data['tables']="question q";
		$data['columns']=array('q.question','qo.option');
		$data['conditions']=array("qo.id"=>$arrArgs);
		$data['joins'][] = array(
		'table' => 'question_options qo', 
		'type'	=> 'inner',
		'conditions' => array('q.id' => 'qo.ques_id'));
		$result = $this->_db->select($data);
		while($row[]	=	$result->fetch(PDO::FETCH_ASSOC)){
			
		}
		return($row);
		}

	}
	function fetchSpecificResult($arrArgs=array()) {
		$sql="select t.id,count(t.id) as score, 
			tt.total_ques,t.first_name,t.start_time,
			t.end_time,	t.last_name,t.email_enroll_no from
				test_taker_ques tq 
			join test_taker t
				on tq.test_taker_id=t.id 
			join question_options qo
				on tq.answer_given=qo.id
			join test tt
				on tt.id=t.test_id
			where t.test_id='1' and qo.correct='1'
			AND t.id='".$arrArgs['id']."'
			group by t.id";
		$result = $this->_db->query($sql);
		$row=	$result->fetch(PDO::FETCH_ASSOC);
		if($row) {
			return($row);
		} else {
			return -1;
		}
	

	}
}
	
?>	
