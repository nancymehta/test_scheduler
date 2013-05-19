<?php
	require(LIBRARY_ROOT."server_validation/validation.php");
	require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
	//include_once(MODEL_PATH."db_connect.php");
	//setting custom handler
	//$old_error_handler = set_error_handler("myErrorHandler");
function myErrorHandler($errno, $errstr, $errfile, $errline) {
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo $message="<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo $message.="  Fatal error on line $errline in file $errfile";
        echo $message.=", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo $message.="Aborting...<br />\n";
        $subject="E_USER_ERROR";
        mailTest("info.test.scheduler@gmail.com",$subject,$message);
        exit(1);
        break;

    case E_USER_WARNING:
    	$subject="E_USER_WARNING";
        echo $message="<b>My WARNING</b> [$errno] $errstr<br />\n";
          mailTest("info.test.scheduler@gmail.com",$subject,$message);
        break;

    case E_USER_NOTICE:
    	$subject="E_USER_NOTICE";
        echo $message="<b>My NOTICE</b> [$errno] $errstr<br />\n";
          mailTest("info.test.scheduler@gmail.com",$subject,$message);
        break;

    default:
    	$subject="Unknown ERROR";
        echo $message="Unknown error type: [$errno] $errstr
        at  file : $errfile,and line : $errline<br />\n";
         mailTest("info.test.scheduler@gmail.com",$subject,$message);
    	
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}
	
	/*
	 * function emailBody()
	 * emailBody constructs the email body and calls the mailing function
	 * to send email to intended recipient(s).
	 *
	 * KINDLY GO THROUGH THE FOLLOWING COMMENT BEFORE USING THIS FUNCTION.
	 *
	 * USE THE INDEX NAME EXACTLY AS MENTIONED.
	 * AND USE ALL THE MENTIONED INDEXES CORRESPONDING TO A GIVEN email_type.
	 * 
	 * TO USE THIS FUNCTION CONSTRUCT THE FOLLOWING ARRAY.
	 * 
	 * $arrArgs=array(
		"email_type" => "registration  	OR 	feedback	OR 		contactus		OR 		link",
		"to" => "SENDERS ADDRESS HERE (COMMA SEPARATED RECIPIENTS LIST)",
		"subject" => "EMAIL SUBJECT HERE",
	 );
	 *
	 * If email_type is either of registration  	OR 	feedback	OR 		contactus ,
	 * then add the following details to the $arrArgs
	 * $arrArgs=array(
		"id" => "ID OF THE USER"
	 );
	 *
	 * For registration email_type, a password field can also be added if possible.
	 * $arrArgs=array(
		"password" => "PASSWORD USED FOR REGISTRATION"
	 );
	 *
	 * If email_type is link , add the following indexes to the $arrArgs array
	 * $arrArgs=array(
		"link" => "LINK ADDRESS GOES HERE" ,
		"test_name" => "TEST NAME GOES HERE" ,
		"start_time" => "START TIME FOR THE TEST GOES HERE."
	 );
	 * */
	function emailBody($arrData=array()) {
		if($arrData) {
			if($arrData['email_type'] && $arrData['to'] && $arrData['subject']) {
				$template_type=array(
					"registration",
					"feedback",
					"contactus",
					"link"
				);
				
				if(in_array($arrData['email_type'],$template_type)) {
					/*
					 * Fetching Email Template Content
					 * */
					$data=array();
					$data['tables'] = 'email_template';
					$data['columns']= array('email_content');
					$data['conditions']	= array(
							"email_type" => $arrData['email_type'],
							"status" => "0"
					);
					$result = $this->_db->select($data);
					$row = $result->fetch(PDO::FETCH_ASSOC);
					$emailContent=$row['email_content'];
					
					if($arrData['email_type']=="link") {
						$emailContent=str_replace("<TEST_NAME>",$arrData['test_name'],$emailContent);
						$emailContent=str_replace("<START_TIME>",$arrData['start_time'],$emailContent);
						$emailContent=str_replace("<LINK>",$arrData['link'],$emailContent);
					} else {
						/*
						* Fetching User Name
						* */
						if($arrData['id']) {
							$data=array();
							$data['tables'] = 'user_profile';
							$data['columns']= array('first_name','last_name');
							$data['conditions']	= array(
								   "user_id" => $arrData['id'],
							);
							$result = $this->_db->select($data);
							$row = $result->fetch(PDO::FETCH_ASSOC);
							$userName=$row['first_name']. " " . $row['last_name'];
							$emailContent=str_replace("<USER>",$userName,$emailContent);
							if($arrData['email_type']=="registration") {
								if($arrData['password']) {
									$emailContent=str_replace("<PASSWORD>",$arrData['password'],$emailContent);
								}
							}
						} else {
							$_SESSION['SESS_ERROR']="No User Provided For Email.<br/>";
							exit;
						}
					}
					mailTest($arrData['to'],$arrData['subject'],$emailContent,$arrData['attach']);
				}
				else {
					$_SESSION['SESS_ERROR']="Email Type Not Recognised.<br/>";
					exit;
				}
			} else {
				$_SESSION['SESS_ERROR']="Insufficient Parameters Passed For Mail<br/>";
				exit;
			}
		} else {
			$_SESSION['SESS_ERROR']="No Data Recieved For Email Template.<br/>";
		}
	}
	/**function to Send Mails from test_scheduler*/
function mailTest($to,$sub,$body,$attach='') {
	
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP 
	$mail->Host = "smtp.gmail.com"; // SMTP servers 
	$mail->SMTPAuth = true; // turn on SMTP authentication 
	$mail->Username = "info.test.scheduler@gmail.com"; // SMTP username 
	$mail->Password = "osscube@123"; // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->From = "info.test.scheduler@gmail.com"; 
	$mail->FromName = "Admin_Test_Scheduler";
	$temp=explode(",",$to);
	$counter=1;
	foreach($temp as $address) {
		$mail->AddAddress("$address","Member".$counter);
		$counter++;
	}
	$mail->WordWrap = 50; // set word wrap 
	$mail->IsHTML(true); 
	$mail->Subject = "$sub"; 
	$mail->Body = "$body"; 
	$mail->AltBody = "Mail Form test Scheduler";
	$mail->AddAttachment($attach);
	if(!$mail->Send()) { 
		echo "Message was not sent <p>"; 
		echo "Mailer Error: " . $mail->ErrorInfo; 
		exit;
	}	

echo "Message has been sent"; 
}
/*Common class holds the Common Method Such as
loadView & loadModel*/
class common {

	function loadView($templateName,$arrPassValue='')
	{

		$view_path=VIEW_PATH.$templateName.".php";
		if(file_exists($view_path)){
			if(isset($arrPassValue)){
				$arrData=$arrPassValue;
			}

			include_once($view_path);
		}else{
			die($templateName. 'View File Not Found under View Folder');
		}
	}


	function loadModel($modelName,$function,$arrArgument='')
	{
		$model_path=MODEL_PATH.$modelName.'Model.php';

		if(file_exists($model_path)){
			include_once($model_path);
			$modelClass=$modelName.'Model';
			if(!method_exists($modelClass,$function)){
				die($function .' function not found in Model '.$modelName);
			}

			$obj=new $modelClass;
			if(isset($arrArgument)){
				return $obj-> $function($arrArgument);
			}else{
				return $obj-> $function();
			}
		}
		else{
			die($modelName. ' Model Not Found under Model Folder');
		}


	}
}

