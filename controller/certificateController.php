<?php
/* @author 		 :Ashwani Singh
 * @created on   :07-05-2013
*  @desc		 :Controller to manage certificate.
****************Modifed Log ********************************
*Name			Task			    Date			Description

************************************************************
*
*/
include SITE_ROOT . 'controller/mainController.php';
class certificateController extends mainController {
	public $validation;

	//Making the object of validation Class
	public function __construct()
	{
		$this->validation	=	new validation();
	}

	
		
	/********Methods related to certificate management **************/
	
	
	# method to show certificate issue view
	function issueCertificateView() {
		try {
			
			$arrData = $this->loadModel ( 'certificate', 'getTestDetails', array (
						"id" => $_SESSION ['SESS_USER_ID']
						) );
			
			if (! empty ( $arrData )) {
				
				$this->loadView("header" );
				$this->loadView("user_header" );
				$this->loadView("user_examiner_view/deshboard_menu" );
				$this->loadView("user_examiner_view/issueCertificate",$arrData);
			} else {
				echo 'could not display the page sorry.';
			}		
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}

	# method to show certificate create view
	function showCertificateCreate() {
		try {
			$result=$this->loadModel('certificate','populateDropDown');
			$this->loadView("header" );
			$this->loadView("user_header" );
			$this->loadView("user_examiner_view/deshboard_menu" );
			$this->loadView("user_examiner_view/showCertificateCreate",$result);
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	

	# method to create certificate
	function certificateCreate() {
		try {
			$validation =new validation();
		
			if ($validation->checkRequired($_POST ['certificate_name']) && 
				$validation->checkRequired($_POST ['certificate_body']) && 
					$validation->checkRequired($_POST ['test_select']) &&
					!empty($_POST ['test_select'])) {

				if ($validation->validateCertificateInput($_POST ['certificate_name']) &&
					$validation->validateCertificateInput($_POST ['certificate_body'])) {
			
					if ($validation->checkLength($_POST ['certificate_name'],1,30) &&
							$validation->checkLength($_POST ['certificate_body'],1,100)) {

						$certificateName	 = strip_tags ($_POST ['certificate_name']);
						$certificateBody 	 = strip_tags ($_POST ['certificate_body']);
						$testId				 = strip_tags ($_POST ['test_select']);
						
						$arrArgs = array (
								   	'name' 				=> $certificateName,
									'certificate_body' 	=> $certificateBody,
									'test_id'			=> $testId,
									'created_by'		=> $_SESSION ['SESS_USER_ID']
									);
						$boolResult = $this->loadModel ( 'certificate', 'createNewCertificate', $arrArgs );
						if ($boolResult) {
							echo 'created certificate successfully';
						} else {
							echo 'could not create certificate';
						}
					}
				} else {
					echo INVALID_INPUT;
				}
			} else {
				echo SELECT_TEST;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}


	function issueCertificate() {
		try {
			$testId = $_REQUEST['test_id'];
			
			$ckCertificate=$this->loadModel("certificate","checkCertificate",$testId);
			
			if($ckCertificate) {
				#create array containg user details name, marks , total marks
				$userDetails=$this->loadModel("certificate","userDetails",$testId);
				
				#loading model to dynamically generate certificate
				$certificate=$this->loadModel ( 'certificate', 'drawCertificate', $userDetails );
				
				
				if($certificate){
					foreach($userDetails as $key=>$value) {
						$email=$value['email_enroll_no'];
						$certficateName=$value['name'];
						$body=CERT_MAILED_MSG;
						$output = shell_exec("chmod 777 misc -R");
						echo $output; # to execute shell command
						$attach = SITE_ROOT.'/misc/SavedCertificate/'.$email.'.jpeg';
					
						/*$argArray = array( 	'cron_name' 		=> 'mailCertificateScript',
											'cron_Script_path'  => SITE_ROOT.'cron/mailCertificateScript.php',
											'cron_time'         => '2 17 * * * '
									);
					
						//$this->loadModel('cron','createCronjob',$argArray); */
						#Mailing certificate
						mailTest ( $email, CERT_MAILED_SUBJECT, $body, $attach); 
											
		
					}
				} else {
					echo CERT_ISSUE_FAILED_MSG;
				}
			} else {
				echo NO_CERTIFICATE_MSG;
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}
