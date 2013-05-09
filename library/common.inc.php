<?php
function mailTest($to,$sub,$body) {
	require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
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

