<?php
/* @author 		 :Siddarth Chowdhary
 * @created on   :07-05-2013
* @desc		 	 :Model for creating , updating and deleting a test.
****************Modifed Log ********************************
*Name			Date			Description
*Siddarth       9/5/13          added createNewTest,editTest,updateTest
*Siddarth		10/5/13			getTestCategories,getTestNames
*Siddarth		11/5/13			created test settings
*Siddarth		12/5/13			worked on test settings,getTestLinkValues
*Ashwani 		12/5/13 		added methods related to certificate management
*Siddarth		13/5/13			added getTestCategoryValues,updateTestCategory
************************************************************
*
*/include MODEL_PATH . "db_connect.php";
class createTestModel extends dbConnectModel {
	function __construct() {
		parent::__construct ();
	}
	
	#creating a new test
	public function createNewTest($arrArgs) {
		try {
			if (! empty ( $arrArgs )) {
				#query to insert data in table test
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
					#query to select cat id from category table for a particular category name
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
					#query to insert data in the test_category table
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
	
	#Viewing Tests categories
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
	
	#Viewing Tests categories
	public function getTestNames($arrArgs) {
		try {
			$testArray = array ();
			$data ['tables'] = 'test';
			$data ['columns'] = array (
					'name',
					'id' 
			);
			$data ['conditions'] = array (
					'created_by' => $arrArgs ['id'],
					'status'=>'0' 
			);
			
			$result = $this->_db->select ( $data );
			//print_r($result);die;
			while ( $row = $result->fetch ( PDO::FETCH_ASSOC ) ) {
				$testArray ['testName'] [] = $row ['name'];
				$testArray ['testId'] [] = $row ['id'];
			}
			return $testArray;
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	#Deleting Test
	public function deleteTest($testId) {
		try {
			$data = array (
					'status' => '1' 
			);
			$where = array (
					'id' => $testId 
			);
			$result_update = $this->_db->update ( 'test', $data, $where );
			if ($result_update) {
				return true;
			} else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	
	#Test Settings
	public function testSettings($arrArgs) {
		try {
			//var_dump($arrArgs);die;
			if (! empty ( $arrArgs )) {
				#select query to check whether data exists for particular test in test_link table
				$temp = $arrArgs ['test_id'] . $arrArgs ['test_name'];
				//echo $temp;die('here');
				$row = $this->getTestLinkValues($arr=array('test_id'=>$arrArgs['test_id']));
				if(empty($row)){
					#query to insert data in the test_link table
					$data ['tables'] = 'test_link';
					$data ['columns'] = array (
							'test_id' => $arrArgs['test_id'],
							'random' => $arrArgs['random'],
							'start_time' => $arrArgs['start_time'],
							'end_time' => $arrArgs['end_time'],
							'link' => md5($temp),
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
	
	#Updating Test
	public function updateTest($arrArgs) {
		try {
			#deleting then inserting coz of multiple issue used this strategy
			$result_delete = $this->_db->delete ( 'test_category', array (
					'test_id' => $arrArgs ['test_id'] 
			) );
			for($i = 0; $i < count ( $arrArgs ['categoryName'] ); $i ++) {
				#query to select cat id from category table for a particular category name
				$data ['tables'] = 'category';
				$data ['columns'] = array (
						'id' 
				);
				$data ['conditions'] = array (
						'name' => $arrArgs ['categoryName'] [$i],
						'created_by'=>$arrArgs['user_id'] 
				);
				$result_select = $this->_db->select ( $data );
				$row = $result_select->fetch ( PDO::FETCH_ASSOC );
				if (! empty ( $row ['id'] )) {
					$catId = $row ['id'];
				} else {
					return false;
				}
				#query to insert data in the test_category table
				$data ['tables'] = 'test_category';
				$data ['columns'] = array (
						'test_id' => $arrArgs ['test_id'],
						'cat_id' => $catId,
						'created_on' => 'NOW()',
						'updated_on' => 'NOW()',
						'created_by' => $arrArgs ['user_id'] 
				);
				
				$result_insert = $this->_db->insert ( $data ['tables'], $data ['columns'] );
			}
			
			#query to update the test name in the test table
			$data = array (
					'name' =>$arrArgs ['testName']
			);
			$where = array (
					'id' => $arrArgs ['test_id']
			);
			$result_update = $this->_db->update ( 'test', $data, $where );
			if ($result_delete && $result_insert && $result_update) {
				return true;
			} else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	#getting test link table values for a particular test_id
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
	
	#getting test_category and category table values for a particular test_id
	public function getTestCategoryValues($arrArgs) {
		try {
			$data ['tables'] = 'test_category';
			$data ['conditions'] = array (
					'test_id' => $arrArgs ['test_id']
			);
			$result_select = $this->_db->select ( $data );
			$i=1;
			while ($row = $result_select->fetch ( PDO::FETCH_ASSOC )) {
				$testCategory[$i]['test_id']=$row['test_id'];
				$testCategory[$i]['cat_id']=$row['cat_id'];
				#fetch category name corresponding to cat_id
				$data ['tables'] = 'category';
				$data ['columns'] = array ('id','name');
				$data ['conditions'] = array (
						'id' => $testCategory [$i]['cat_id']
				);
				$result_select_inner = $this->_db->select ( $data );
				$row_inner = $result_select_inner->fetch ( PDO::FETCH_ASSOC );
				$testCategory[$i]['categoryName']=$row_inner['name'];
				$testCategory[$i]['categoryId']=$row_inner['id'];
				$testCategory[$i]['no_of_ques']=$row['no_of_ques'];
				$i++;
			}
			if (! empty ( $testCategory )) {
				return $testCategory;
			} else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	#Updating test_category for manage question functionality no of qs for category
	public function updateTestCategory($arrArgs) {
		try {
			$arrArgsValues = array_values ( $arrArgs );
			array_pop ( $arrArgsValues );
			$count = count ( $arrArgsValues );
			$count = $count / 2;
			$j = 0;
			for($i = 0; $i < $count; $i ++) {
				
				$data = array (
						'no_of_ques' => $arrArgsValues [$j],
						'updated_by' => $_SESSION ['SESS_USER_ID'],
						'updated_on' => 'NOW()' 
				);
				$j ++;
				$where = array (
						'cat_id' => $arrArgsValues [$j],
						'test_id' => $arrArgs ['test_id'] 
				);
				$j ++;
				$result_update = $this->_db->update ( 'test_category', $data, $where );
			}
			//write code here to insert into test_question table
			//select query to fetch cat id and no of ques from test category for a test id
			$data ['tables'] = 'test_category';
			$data ['columns'] = array ('cat_id','no_of_ques');
			$data ['conditions'] = array (
					'test_id' => $arrArgs ['test_id']
			);
			$result_select = $this->_db->select ( $data );
			$temp=0;
			$testCategory=array();
			while ( $row = $result_select->fetch ( PDO::FETCH_ASSOC ) ) {
				$testCategory [$temp] ['cat_id'] = $row ['cat_id'];
				$testCategory [$temp] ['no_of_ques'] = $row ['no_of_ques'];
				$temp++;
			}
			$cnt=count ( $testCategory );
			for($k = 0; $k < $cnt; $k ++) {
				//select query to fetch id from question for a particular cat id
				$data ['tables'] = 'question';
				$data ['columns'] = array (
						'id' 
				);
				$data ['conditions'] = array (
						'category_id' => $testCategory [$k]['cat_id'] 
				);
				$result_select = $this->_db->select ( $data );
				print_r ( $result_select );
				$temp = 0;
				$arrTemp=array();
				while ( $row = $result_select->fetch ( PDO::FETCH_ASSOC ) ) {
					$arrTemp[$temp] = $row['id'];
					$temp++;
				}
				$testCategory[$k]['arrQuesIds'] = $arrTemp;
				
			}
			
			//delete the previous entries in the test_question table
			$result_delete = $this->_db->delete ( 'test_question', array (
					'test_id' => $arrArgs ['test_id']
			) );
			$result='';
			for($i = 0; $i < count ( $testCategory ); $i ++) {
				shuffle($testCategory[$i]['arrQuesIds']);
				$cnt=$testCategory[$i]['no_of_ques'];
				for($k=0;$k<$cnt;$k++){
					//inserting into test_question
					$data ['tables'] = 'test_question';
					$data ['columns'] = array (
							'test_id' => $arrArgs['test_id'],
							'question_id' =>$testCategory[$i]['arrQuesIds'] [$k]
					);
					$result = $this->_db->insert ( $data ['tables'], $data ['columns'] );
				}
			}
			if ($result_update && $result) {
				return true;
			} else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	
	/*********************  Methods related to certificate managment **************/
	
	# Method to create new certificate
	public function createNewCertificate($arrArgs) {
		try {
			if (! empty ( $arrArgs )) {
				$data ['tables'] = 'certificate_master';
				$data ['columns'] = array (
										'name'				=> $arrArgs ['name'],
										'certificate_body'  => $arrArgs ['certificate_body'],
										'created_on' 		=> 'now()',
										'updated_on' 		=> 'now()',
										'created_by' 		=> 1,
										'upload_path'		=> SITE_PATH."misc/certificateUploads/certificate.jpg"
									);
								

				$result_query = $this->_db->insert ( $data ['tables'], $data ['columns'] );
				
				if ($result_query) {
					return true;
				} else {
					return false;
				}
			 } else {
				return false;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	# Method to show certificate
	public function showCertificate($arrArgs) {
		try {	
			if (! empty ( $arrArgs )) {	
				$data ['tables'] 	 = 'certificate_master';
				$data ['conditions'] = array(
											'id' => $arrArgs ['id']
									   );
									  
				#selecting certificate details from certificate_master table					  
				$result_select = $this->_db->select ( $data ); 
				$row = $result_select->fetch ( PDO::FETCH_ASSOC );
				
				if (!empty ( $row ) == 1) { 
					return $row; # returning certificate details 
				} else {
					return false;
				}
			} else {
				return false;
			}		
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	# Method to dynamically create certificate
	public function drawCertificate($arrArgs) {
		try {  
			$error=array();
				echo "<pre/>";
				print_r($arrArgs);
			if (! empty ( $arrArgs )) {
				foreach( $arrArgs as $key => $value)  {		
			
					$certficateName = $value['name'];
					$firstName 		= $value['first_name'];
					$lastName 		= $value['last_name'];
					$marksObtained	= $value['score'];
					$imagePath		= $value['upload_path'];
					$email			= $value['email_enroll_no'];
					$completeName	= $firstName." ".$lastName ;
					$imageSavePath=DOC_ROOT."/misc/SavedCertificate/".$email.".jpeg";	
				 
					$font = 8;		#fontsize for writing details on certificate
					$im = ImageCreateFromJPEG( $imagePath );
			
					$backgroundColor = imagecolorallocate ($im, 255, 255, 255);
					$textColor = imagecolorallocate ($im, 0, 0,0);

					#writing user specific details on the certificate
					imagestring ($im, $font, 60 , 80,  $completeName   , $textColor);
					imagestring ($im, $font, 50 , 110,  $certficateName , $textColor);
					imagestring ($im, $font, 70 , 130,  $marksObtained  , $textColor);
				//	imagestring ($im, $font, 100, 120,  $totralMarks   , $textColor);
				//	imagestring ($im, $font, 100, 144,  $testDate      , $textColor);
				
				
				
					#saving certificate image
					imagejpeg($im, $imageSavePath, 100);				
					$error="";
				}	
				
				
			} else {
				return 0;
			}		
			if(empty($error)){
				return 1;
			}
		} 
		catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
}
	
public function userDetails() {
	$data['tables'] = 'test_link';
	$data['columns']   = array('first_name','last_name','pass_marks','certificate_id',
								'test_taker.score','certificate_master.name',
								'certificate_master.upload_path','test_taker.email_enroll_no'
						  );
	/*$data['conditions']	= array(
								'test_taker.test_id' => $arrArgument['testid']
								); */
	$data['joins'][] = array(
							'table' => 'test_taker', 
							'type'	=> 'inner',
							'conditions' => array('test_link.id' => 'test_taker.test_link_id')
							);
	$data['joins'][] = array(
							'table' => 'certificate_master', 
							'type'	=> 'inner',
							'conditions' => array('certificate_master.id' => 'test_link.certificate_id')
							);						
							
	$result = $this->_db->select($data);

	while($temp = $result->fetch(PDO::FETCH_ASSOC)) {
	//	if($temp['score'] >= $temp['pass_marks']) {
					
					$row[]=$temp;
	 //	}
	} 	   
	if(isset($row)) {
	
		return $row;		
	
	} else {
		echo "No Record Found";
		return 0;
	}	
	
	
 }

}
