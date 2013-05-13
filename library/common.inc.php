<?php
	require(LIBRARY_ROOT."server_validation/validation.php");
	require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
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
	
	/**function to Send Mails from test_scheduler*/
function mailTest($to,$sub,$body) {
	
	$mail = new PHPMailer();
	$mail->IsSMTP(); // send via SMTP 
	$mail->Host = "smtp.gmail.com"; // SMTP servers 
	$mail->SMTPAuth = true; // turn on SMTP authentication 
	$mail->Username = "info.test.scheduler@gmail.com"; // SMTP username 
	$mail->Password = "osscube@123"; // SMTP password
	$mail->SMTPSecure = 'tls';
	$mail->From = "info.test.scheduler@gmail.com"; 
	$mail->FromName = "Admin_Test_Scheduler"; 
	$mail->AddAddress("$to","Member"); 
	$mail->WordWrap = 50; // set word wrap 
	$mail->IsHTML(true); 
	$mail->Subject = "$sub"; 
	$mail->Body = "$body"; 
	$mail->AltBody = "Mail Form test Scheduler";
	if(!$mail->Send()) 
	{ 
	echo "Message was not sent <p>"; 
	echo "Mailer Error: " . $mail->ErrorInfo; 
	exit; 	}	

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

