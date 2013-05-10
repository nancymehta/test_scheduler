<?php
	include MODEL_PATH."db_connect.php";
class testModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	/*return the testID according to link*/
	function getTestId($arrArgs=array()) {
		//write a quesry to get test id and test link id according to test_url
		return array("test_id"=>1,"test_link_id"=>1);
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
		$data['tables']="test_link";
		$result = $this->_db->select($data);
		return ($row	=	$result->fetch(PDO::FETCH_ASSOC));
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
			//
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
	
?>	
