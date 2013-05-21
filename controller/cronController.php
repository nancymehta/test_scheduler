<?php
/* @author 		 :Ashwani Singh
 * @created on   :19-05-2013
*  @desc		 :Controller to manage cronjobs
*  @todo 		  : server side validation
****************Modifed Log ********************************
*Name			Task			    Date			Description

************************************************************
*
*/
include SITE_ROOT . 'controller/mainController.php';
class cronController extends mainController {
	public $validation;

	//Making the object of validation Class
	public function __construct()
	{
		$this->validation	=	new validation();
	}

	
		
	/********Methods related to cron management **************/
	
	
	# method to show cron jobs view
	function showCronjobView() {
		try {
			
			
				$this->loadView("header" );
				$this->loadView("user_header" );
				$this->loadView("user_examiner_view/deshboard_menu" );
				$this->loadView("cron");
					
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	# method to create cronjobs
	function createCronjob() {
		try {
				
				//if(isset($_REQUEST['cron_name']);
				if(isset($_POST)) {
					
					$cronName = $_REQUEST['cron_name'];
					
					$cronScriptPath = $_REQUEST['cron_Script_path'];
					
					$cronMin     = $_REQUEST['cron_min'];
					$cronHours	 = $_REQUEST['cron_hours'];
					$cronDays	 = $_REQUEST['cron_days'];
					$cronMonths  = $_REQUEST['cron_months'];
					$cronDay 	 = $_REQUEST['cron_day'];
					
					$cronTime = $cronMin." ".$cronHours." ".$cronDays." ".$cronMonths." ".$cronDay;
				//	echo $cronTime;
					
					$cronData = array( 'cron_name'		   => $cronName, 
									   'cron_Script_path'  => $cronScriptPath ,
									   'cron_time' 		   => $cronTime
									 );
					
					$this->loadModel('cron','createCronjob',$cronData);
				}
					
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	# method to show cron jobs view
	function showCronjob() {
		try {
			
			$result = $this->loadModel('cron','showCronjob');
			echo "Running Cronjobs <br>".$result;
					
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	
}
