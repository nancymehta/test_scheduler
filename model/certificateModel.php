<?php
/* @author 		 :Ashwani Singh
 * @created on   :18-05-2013
*  @desc		 	 :Model for managing certificat
****************Modifed Log ********************************
*Name			Task			    Date			Description
************************************************************
*
*/include MODEL_PATH . "db_connect.php";
class certificateModel extends dbConnectModel {
	function __construct() {
		parent::__construct ();
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
				//echo "<pre/>";
				//print_r($arrArgs);
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
				 
					$font = 6;		#fontsize for writing details on certificate
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
}
