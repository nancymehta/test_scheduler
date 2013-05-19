<?php
/* @author 		 :Ashwani Singh
 * @created on   :19-05-2013
*  @desc		 :Model for cron jobs
*  @todo 		  : server side validation
****************Modifed Log ********************************
*Name			Task			    Date			Description
************************************************************
*
*/include MODEL_PATH . "db_connect.php";
class cronModel extends dbConnectModel {
	function __construct() {
		parent::__construct ();
	}
	
		
	/*********************  Methods related to cronjob management **************/
	
	# Method to create new cronjob
	public function createCronjob($arrArgs) {
		try {
			
			$cronName 		= $arrArgs['cron_name'];
			$cronScriptPath = $arrArgs['cron_Script_path'];
			$cronTime 		= $arrArgs['cron_time'];
			
			$cronLogFile	= SITE_ROOT."cron/cron_log.txt";   //log file for cron jobs
			
			#cron job entry -> to be written in cronjob config file
			$content = $cronTime." ".$cronScriptPath = $arrArgs['cron_Script_path']." >>".$cronLogFile." \n";
			//echo $content;
			
			$cronConfigFile = $cronName.".txt";
			$fp = fopen("$cronConfigFile","w");			# creating files which will contain cronjob
			
			$command = shell_exec("chmod 777 $cronConfigFile -R");
			
			echo $command; # executes command to change file permissions
			
			#writing cronjob entry to the cron config file
			if(file_put_contents($cronConfigFile,$content)) {   
				
				$cronTab="crontab"." ".SITE_ROOT.$cronConfigFile; # preparing crontab command 
				
				if(print(shell_exec($cronTab))) { //working congrats :)
					echo "cron job created successfully ";
				} else {
					echo "cron job creation failed";
				}
				echo "running cron";
				$output = shell_exec('crontab -l'); # command to show running cronjobs
				echo $output;
			
			} else {
				echo "cronjob config file operation failed";
			}		
			
		} catch ( Exception $e ) {
			$this->handleException ( $e->getMessage () );
		}
	}
	
	
}
