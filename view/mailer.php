sdsadas
//error handling

<?php
require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
function myErrorHandler($errno, $errstr, $errfile, $errline) {

$mail = new PHPMailer();
$mail->IsSMTP(); // send via SMTP 
$mail->Host = "smtp.gmail.com"; // SMTP servers 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "gnxtstar007@gmail.com"; // SMTP username 
$mail->Password = "password"; // SMTP password
$mail->SMTPSecure = 'tls';
$mail->From = "gnxtstar007@gmail.com"; 
$mail->FromName = "Mailer"; 
$mail->AddAddress("gnxtstar007@gmail.com","Gourav Khanna"); 
$mail->WordWrap = 50; // set word wrap 
$mail->IsHTML(true); 
$mail->AltBody = "There is error :p";
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo $mail->Body ="Unknown error type: [$errno] $errstr<br />\n";
        $mail->Subject = "Error Occured"; 
		if(!$mail->Send())  { 
			echo "Message was not sent <p>"; 
			echo "Mailer Error: " . $mail->ErrorInfo; 
			return; 
		}
		//error_log("what the g");
		echo "Message has been sent"; 
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}
$old_error_handler = set_error_handler("myErrorHandler");
echo $_;
echo $test;

?>

<?php /*
require(LIBRARY_ROOT."PHPMailer_5.2.4/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // send via SMTP 
$mail->Host = "smtp.gmail.com"; // SMTP servers 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "username"; // SMTP username 
$mail->Password = "mail"; // SMTP password
$mail->SMTPSecure = 'tls';
$mail->From = "gnxtstar007@gmail.com"; 
$mail->FromName = "Mailer"; 
$mail->AddAddress("gnxtstar007@gmail.com","Gourav Khanna"); 


$mail->WordWrap = 50; // set word wrap 
$mail->IsHTML(true); 
$mail->Subject = "Here is the subject"; 
$mail->Body = "This is the <b>HTML body</b>"; 
$mail->AltBody = "This is the text-only body";
if(!$mail->Send()) 
{ 
echo "Message was not sent <p>"; 
echo "Mailer Error: " . $mail->ErrorInfo; 
exit; 
}

echo "Message has been sent"; */
?>

