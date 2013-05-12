<?php
/* @author 		 :Siddarth Chowdhary
 * @created on   :07-05-2013
* @desc		 	 :Model to create a test.
****************Modifed Log ********************************
*Name			Date			Description
*Siddarth       9/5/13          added createNewTest,editTest,updateTest
*Siddarth		10/5/13			getTestCategories,getTestNames
*Siddarth		11/5/13			created test settings
*Siddarth		12/5/13			worked on test settings,getTestLinkValues
*
************************************************************
*
*/include MODEL_PATH . "db_connect.php";
class createTestModel extends dbConnectModel {
	function __construct() {
		parent::__construct ();
	}
	
	// creating a new test
	public function createNewTest($arrArgs) {
		try {
			if (! empty ( $arrArgs )) {
				// query to insert data in table test
				$data ['tables'] = 'test';
				$data ['columns'] = array (
						'name' => $arrArgs ['testName'],
						'created_on' => 'NOW()',
						'updated_on' => 'NOW()',
						'created_by' => $arrArgs ['user_id'] 
				);
				$result_query_1 = $this->_db->insert ( $data ['tables'], $data ['columns'] );
				
				$testId = $this->_db->lastInsertId ();
				for($i = 0; $i < count ( $arrArgs [categoryName] ); $i ++) {
					// query to select cat id from category table for a particular category name
					$data ['tables'] = 'category';
					$data ['columns'] = array (
							'id' 
					);
					$data ['conditions'] = array (
							'name' => $arrArgs ['categoryName'] [$i] 
					);
					$result_select = $this->_db->select ( $data );
					$row = $result_select->fetch ( PDO::FETCH_ASSOC );
					if (! empty ( $row ['id'] )) {
						$catId = $row ['id'];
					} else {
						return false;
					}
					// query to insert data in the test_category table
					$data ['tables'] = 'test_category';
					$data ['columns'] = array (
							'test_id' => $testId,
							'cat_id' => $catId,
							'created_on' => 'NOW()',
							'updated_on' => 'NOW()',
							'created_by' => $arrArgs ['user_id'] 
					);
					
					$result_query_2 = $this->_db->insert ( $data ['tables'], $data ['columns'] );
				}
				if ($result_query_1) {
					if ($result_query_2) {
						return true;
					} else {
						return false;
					}
				} else {
					return false;
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	// Viewing Tests categories
	public function getTestCategories($arrArgs) {
		try {
			$categoryArray = array ();
			$data ['tables'] = 'category';
			$data ['columns'] = array (
					'name',
					'id' 
			);
			$data ['conditions'] = array (
					'created_by' => $arrArgs ['id'] 
			);
			
			$result = $this->_db->select ( $data );
			while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				$categoryArray ['category_name'] [] = $row ['name'];
				$categoryArray ['category_id'] [] = $row ['id'];
			}
			return $categoryArray;
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	// Viewing Tests categories
	public function getTestNames($arrArgs) {
		try {
			$testArray = array ();
			$data ['tables'] = 'test';
			$data ['columns'] = array (
					'name',
					'id' 
			);
			$data ['conditions'] = array (
					'created_by' => $arrArgs ['id'] 
			);
			
			$result = $this->_db->select ( $data );
			while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				$testArray ['testName'] [] = $row ['name'];
				$testArray ['testId'] [] = $row ['id'];
			}
			// print_r($categoryArray);die("here");
			return $testArray;
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	// Deleting Test
	public function deleteTest() {
		try {
			//query needed
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	
	// Test Settings
	public function testSettings($arrArgs) {
		try {
			if (! empty ( $arrArgs )) {
				//select query to check whether data exists for particular test in test_link table
				$row = $this->getTestLinkValues($arr=array('test_id'=>$arrArgs['test_id']));
				if(empty($row)){
					// query to insert data in the test_link table
					$data ['tables'] = 'test_link';
					$data ['columns'] = array (
							'test_id' => $arrArgs['test_id'],
							'random' => $arrArgs['random'],
							'start_time' => $arrArgs['start_time'],
							'end_time' => $arrArgs['end_time'],
							'link' => md5($arrArgs['test_id']),
							'time_limit' => $arrArgs ['time_limit'],
							'feedback' => $arrArgs ['feedback'],
							'email_results' => $arrArgs ['email_results'],
							'created_by'=> $arrArgs ['created_by'],
							'pass_marks'=> $arrArgs ['pass_marks'],
							'per_page_ques' =>$arrArgs ['per_page_ques']
					);
					
					$result = $this->_db->insert ( $data ['tables'], $data ['columns'] );
						if ($result) {
							return true;
						} else {
							return false;
						}
				} else {
					$data = array (
							'random' => $arrArgs['random'],
							'start_time' => $arrArgs['start_time'],
							'end_time' => $arrArgs['end_time'],
							'time_limit' => $arrArgs ['time_limit'],
							'feedback' => $arrArgs ['feedback'],
							'email_results' => $arrArgs ['email_results'],
							'created_by'=> $arrArgs ['created_by'],
							'pass_marks'=> $arrArgs ['pass_marks'],
							'per_page_ques' =>$arrArgs ['per_page_ques']
					);
					$where = array (
							'test_id' => $arrArgs ['test_id']
					);
					$result_update = $this->_db->update ( 'test_link', $data, $where );
					if ($result_update) {
						return true;
					} else {
						return false;
					}
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	// Updating Test
	public function updateTest($arrArgs) {
		try {
			echo '<pre>';
			print_r ( $arrArgs );
			// update in table test
			$data = array (
					'name' => $arrArgs ['testName'] 
			);
			$where = array (
					'id' => $arrArgs ['test_id'] 
			);
			$result_update = $this->_db->update ( 'test', $data, $where );
			// print_r($result_update);
			$result_delete = $this->_db->delete ( 'test_category', array (
					'test_id' => $arrArgs ['test_id'] 
			) );
			// print_r($result_delete);
			
			for($i = 0; $i < count ( $arrArgs ['categoryName'] ); $i ++) {
				// query to select cat id from category table for a particular category name
				$data ['tables'] = 'category';
				$data ['columns'] = array (
						'id' 
				);
				$data ['conditions'] = array (
						'name' => $arrArgs ['categoryName'] [$i] 
				);
				$result_select = $this->_db->select ( $data );
				$row = $result_select->fetch ( PDO::FETCH_ASSOC );
				if (! empty ( $row ['id'] )) {
					$catId = $row ['id'];
				} else {
					return false;
				}
				// query to insert data in the test_category table
				$data ['tables'] = 'test_category';
				$data ['columns'] = array (
						'test_id' => $arrArgs ['test_id'],
						'cat_id' => $catId,
						'created_on' => 'NOW()',
						'updated_on' => 'NOW()',
						'created_by' => $arrArgs ['user_id'] 
				);
				
				$result_insert = $this->_db->insert ( $data ['tables'], $data ['columns'] );
				// print_r($result_insert);
				if ($result_update && $result_delete && $result_insert) {
					return true;
				} else {
					return false;
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	//getting test link table values for a particular test_id
	public function getTestLinkValues($arrArgs) {
		try {
			$data ['tables'] = 'test_link';
			$data ['conditions'] = array (
					'test_id' => $arrArgs ['test_id']
			);
			$result_select = $this->_db->select ( $data );
			$row = $result_select->fetch ( PDO::FETCH_ASSOC );
			if (!empty ( $row ) == 1) {
				return $row;
			} else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
}