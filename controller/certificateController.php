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
			
			
			$arrData_1 = $this->loadModel ( 'certificate', 'getTestCategories', array (
					"id" => $_SESSION ['SESS_USER_ID']
			) );
			$arrData_2 = $this->loadModel ( 'certificate', 'getTestNames', array (
					"id" => $_SESSION ['SESS_USER_ID']
			) );
			$arrData = array (
					'category' => $arrData_1,
					'test' => $arrData_2
			);
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
			$this->loadView("header" );
			$this->loadView("user_header" );
			$this->loadView("user_examiner_view/deshboard_menu" );
			$this->loadView("user_examiner_view/showCertificateCreate");
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	

	# method to create certificate
	function certificateCreate() {
		try {
			$validation =new validation();
		
			if ($validation->checkRequired($_POST ['certificate_name']) &&
					$validation->checkRequired($_POST ['certificate_body'])) {

				if ($validation->validateAlphabate($_POST ['certificate_name']) &&
					$validation->validateAlphabate($_POST ['certificate_body'])) {
			
					if ($validation->checkLength($_POST ['certificate_name'],1,30) &&
							$validation->checkLength($_POST ['certificate_body'],1,100)) {

						$certificateName	 = strip_tags ($_POST ['certificate_name']);
						$certificateBody 	 = strip_tags ($_POST ['certificate_body']);
						$arrArgs = array (
								   	'name' 				=> $certificateName,
									'certificate_body' 	=> $certificateBody
									);
						$boolResult = $this->loadModel ( 'certificate', 'createNewCertificate', $arrArgs );
						if ($boolResult) {
							echo 'created certificate successfully';
						} else {
							echo 'could not create certificate';
						}
					}
				} else {
					echo "please enter valid input";
				}
			}
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}

	#method to show certificate
	function showCertificate() {
		try {
			$userDetails=$this->loadModel("certificate","userDetails");
			print_r($userDetails);
		
			$certificate=$this->loadModel ( 'certificate', 'drawCertificate', $userDetails );
			if($certificate){
			//	$this->loadView("header");
				//	$this->loadView("user_header");
				//	$this->loadView("user_examiner_view/showCertificateCreate",$certificate);
				foreach($userDetails as $key=>$value) {
					$email=$value['email_enroll_no'];
					$certficateName=$value['name'];
					$body="Your certificate has been ";
					$output = shell_exec("chmod 777 misc -R");
					$attach='/var/www/test_scheduler/trunk/misc/SavedCertificate/'.$email.'.jpeg';
					mailTest ( $email, 'info.test.scheduler@gmail.com', $body, $attach);
				}
			} else{
				echo 'could not show certificate';

			}
		} catch(Exception $e) {
			$this->handleException ( $e->getMessage () );
		}
	}

	function issueCertificate() {
		try {
			#create array containg user details like name, marks , total marks
			$userDetails=$this->loadModel("certificate","userDetails");
			//print_r($userDetails);
				
			#loading model to dynamically generate certificate
			$certificate=$this->loadModel ( 'certificate', 'drawCertificate', $userDetails );
		if($certificate){
			foreach($userDetails as $key=>$value) {
					$email=$value['email_enroll_no'];
					$certficateName=$value['name'];
					$body="Your certificate has been send. Kindly find the attachment";
					$output = shell_exec("chmod 777 misc -R");
					echo "$output"; # to execute shell command
					$attach='/var/www/test_scheduler/trunk/misc/SavedCertificate/'.$email.'.jpeg';
					mailTest ( $email, 'info.test.scheduler@gmail.com', $body, $attach);
				}
			} else {
				echo 'could not show certificate';
			}

		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
}
