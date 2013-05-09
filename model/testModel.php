<?php
	include MODEL_PATH."db_connect.php";
class testModel extends dbConnectModel{
	function __construct() {
		parent::__construct();
	}
	/*return the testID according to link*/
	function getTestId($arrArgs=array()) {
		
		return array("test_id"=>1,"test_link_id"=>1);
	}
	function setUser($arrArgs=array()) {
	
		$result=$this->_db->insert("test_taker",$arrArgs);
		if($result->rowCount()>0) {
			return $this->_db->lastInsertId();
		} else {
			return 0;
		}
	}
}
	
?>	
