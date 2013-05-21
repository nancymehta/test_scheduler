<?php
ini_set("dispaly_errors","1"); 
echo "here";
/*
require_once($_SERVER['DOCUMENT_ROOT'].'/library/constant.path.php');
require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
	
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
		$this->mailTest ( 'ashwani.singh@osscube.com', 'mail test', 'astro');
*/
?>
