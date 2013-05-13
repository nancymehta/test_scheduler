<?php
	include MODEL_PATH."db_connect.php";
/*
 * class testModel
 * testModel deals with the business logic corresponding to test in execution
*/
class testModel extends dbConnectModel{
	/*
	 * function __construct()
	 * __construct constructs the constructor of the dbConnectModel, thus allowing itself to make use of
	 * of the database connectivity.
	*/
	function __construct() {
		parent::__construct();
	}
	/*
	 * function getTestId()
	 * getTestId returns the testID corresponding to a given link
	*/
	function getTestId($arrArgs=array()) {
		//write a quesry to get test id and test link id according to test_url
		$data['tables']="test_link";
		$data['columns']=array("id as test_link_id","test_id");
		$data['conditions']=array("link"=>$arrArgs['link']);
		$result = $this->_db->select($data);
		if($result) {
			$row	=	$result->fetch(PDO::FETCH_ASSOC);
			if(!empty($row)) {
				return $row;
			} else {
				return -1;
			}
		} else {
				return -1;
		}
		//return array("test_id"=>1,"test_link_id"=>1);
	}
	
	/*
	 * function setUser()
	 * setUser register the test taker into the test_taker table.
	*/
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
	
	/*
	 * function fetchTestDetails()
	 * fetchTestDetails fetches the test details from the database (test_link table) and
	 * questions from the question table.
	*/
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
	
	/*
	 * function fetchQuestions()
	 * fetchQuestions fetches the question from the question table.
	*/
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
	/*
	 * function insertAnswer()
	 * insertAnswer inserts the users answer into the test_taker_ques table, according to the question.
	*/
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
				$answer=array("answer_given"=>strip_tags($arrArgs['answer_given']));
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
	/*
	 * function fetchAttemptedQuestions()
	 * fetchAttemptedQuestions fetches all the attemptes questions for the particular user
	 * and loads the corresponding view.
	*/
	function fetchAttemptedQuestions($arrArgs=array()) {
		if(!empty($arrArgs)) {
		$data['tables']="question q";
		$data['columns']=array('q.question','qo.option','q.id');
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
	
	/*
	 * function fetchSpecificResult()
	 * fetchSpecificResult fetches the saved answer of the question(already answered)
	*/
	function fetchSpecificResult($arrArgs=array()) {
		echo "->";print_r($arrArgs);
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
			echo($sql);
		$result = $this->_db->query($sql);
		$row=	$result->fetch(PDO::FETCH_ASSOC);
		if($row) {
			return($row);
		} else {
			return -2;
		}
	}
	
	/*
	 * function fetchTestTime()
	 * fetchTestTime fetches the start time and the end time of the test.
	*/
	function fetchTestTime($arrArgs=array()) {
		$testId=$arrArgs['test_id'];
		$data['tables']="test_link";
		$data['columns']=array("unix_timestamp(start_time) as start_time",
								"unix_timestamp(end_time) as end_time");
		$data['conditions']=array("test_id"=>"$testId");
		$result = $this->_db->select($data);
		$row	=	$result->fetch(PDO::FETCH_ASSOC);
		return ($row);
	}
	
	/*
	 * function insertResult()
	 * insertResult inserts the examinees final result details into the test_taker table.
	*/
	function insertResult($arrData=array()) {
		if(!empty($arrData)) {
			$id=$arrData['id'];
			$percentage="0";
			if($arrData['score']!=0 && $arrData['score']!="" ) {
				$percentage=(($arrData['score']/$arrData['total_ques'])*100);
			} 
			$quesAttempted=count($_SESSION['answers']);
			$data=array(
				"score"=>strip_tags($percentage),
				"end_time"=>"now()",
				"ques_attempted"=>strip_tags($quesAttempted),
					);
			$result=$this->_db->update("test_taker",$data,array("id"=>"$id"));
			if($result->rowCount()>0) {
				return $this->_db->lastInsertId();
			} else {
				return 0;
			}
		}
	}
	
	/*
	 * function insertFeedback()
	 * insertFeedback takes in the feedback from the examinee and saves it in the database
	*/
	function insertFeedback($arrArgs=array()) {
			if(!empty($arrArgs)) {
		/*	$result=$this->_db->update("test_taker",$arrArgs,array("id"=>$_SESSION['guest_id']));
			if($result->rowCount()>0) {
				return $this->_db->lastInsertId();
			} else {
				return 0;
			} */
		}
	}
	
	/*
	 * function fetchUser()
	 * fetchUser fetches the details of the user like name, score, etc.
	*/
	function fetchUser($arrArgs=array()) {
		$id=$arrArgs['id'];
		$data['tables']="test_taker";
		$data['columns']=array("first_name","last_name","email_enroll_no",
							"score");
		$data['conditions']=array("id"=>"$id");
		$result = $this->_db->select($data);
		$row	=	$result->fetch(PDO::FETCH_ASSOC);
		return ($row);
	}
}
	
?>	
