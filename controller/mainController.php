<?php
/**
 * Filename : mainController.php
 * Updated By : Amitesh Bharti
 * Description : provides main controller to control job like show home page,login to database etc
 * Date_of_creation :6-5-2013
 */
//ini_set('display_errors','1');
class mainController extends common{
	function home() {
	try {
   		//$arrValue=$this->loadModel('base','login');
		$this->loadView("header");
		$this->loadView("main_reg_login");
		$this->loadView("main_body");
		$this->loadView("main_footer");

	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	function faq() {// function name need to be change
		try {
				$this->loadView("header");
				$this->loadView("faq");
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	function forget_password(){
		try {
	            $this->loadView ( "header" ); 
	            $this->loadView ( "user_header1" ); 
				$this->loadView("forget_password");
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
		
	function check_forget_email(){
		try {
			if(isset($_POST['email'])){
				$email=strip_tags($_POST['email']);
				$value=$this->loadModel('base','check_forget_email',$email);
				if(empty($value)){
    					$this->loadView ( "header" ); 
	            			$this->loadView ( "user_header1" ); 
					$this->loadView( "forget_password" );
				}
				else{
					$value=$this->loadModel('base','insertToken',$email);
					$this->loadView("header");
					$this->loadView ( "user_header1" ); 
					$this->loadView( "forget_password_email",$email);
					if($value){
						$subject = "Forgot Password on TEST SCHEDULER";
						$uri= $uri = 'http://'. $_SERVER['HTTP_HOST'];
						$body='
							<html>
							<head>
							<title>Forgot Password</title>
							</head>
							<body>
							<p>Click on the given link to reset your password <a href="'.$uri.'/main/resetPassword?token='.$value.'">Reset Password</a></p>
							</body>
							</html>';
						mailTest ( $email,$subject, $body, $attach=''); 
					}
			
				}
				}
		}
		catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}

	function resetPassword(){
			$token=$_GET['token'];
			$value=$this->loadModel("base","fetchEmail",$token);
			if($value){
			$this->loadView("header");
			$this->loadView ( "user_header1" ); 	
			$this->loadView("reset_pass");
			}
			else{
				die("error occured");
			}
		}
		
		function passChanged(){
			if(isset($_POST['password']) && isset($_SESSION['email'])){
				$password=$_POST['password'];
				$value=$this->loadModel("base","updatePassword",$password);
				if($value==1){
					echo "passoword changed";
				}
				else{
					echo "some error occured";
				}
			}
		}
	
	function handleException($message) {
			echo 'Caught exception: '.$message;
	}

	function register() {
		//die("asd");
		  require_once(LIBRARY_ROOT.'/recaptcha/recaptchalib.php');
        	$privatekey = "6LeCCOESAAAAAAGYv2C7L0q5iHz0B7Re-q_frmLw";
        	$resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

      if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
       $_SESSION['SESS_ERROR']="The reCAPTCHA wasn't entered correctly. Go back and try it again.";
   
   	header("location:".SITE_PATH."registeration");
  } else { 
		try {
			$reg_values=array (
					"username"=>strip_tags($_REQUEST['username']),
					"password"=>strip_tags($_REQUEST['password']),
					"firstName"=>strip_tags($_REQUEST['first_name']),
				    "lastName"=>strip_tags($_REQUEST['last_name']),
				     "email"=>strip_tags($_REQUEST['email']));
		 $arrData=$this->loadModel('base','register',$reg_values);	
		if($arrData == 1){
			$_SESSION['SESS_ERROR'] ='You are Successfully Registerd';
			header("location:".SITE_PATH."loadLogin");
		}
		else{
			$_SESSION['SESS_ERROR'] ='Registration Failed Try Again';
			header("location:".SITE_PATH."registeration");	
		}
		
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	}
	function loginView()
	{
		$this->loadView('login');
	}
	
	function login()
	{
		/**
		 *
		 * Created By : Amitesh Bharti
		 * Description :this method is intended to control  the login activity of user
		 * Date_of_creation :9-5-2013
		 */
		try {
		    $arrArgs = array(
				'username'=> @$_POST['user_name'],
				'password'=> @$_POST['password']
				);
			$arrData = $this->loadmodel('base','login',$arrArgs);
			if($arrData == 1){
				$result=$this->loadModel('base','insert_log',"login");
			    header("location:".SITE_PATH);
			}
			else{
			    $_SESSION['SESS_ERROR'] ='Not a Valid UserName/password';
			header("location:".SITE_PATH."loadLogin");
			}
		}catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	function logout(){
		try {
		$_SESSION['SESS_USER_NAME']="";
		$_SESSION['SESS_USER_TYPE']="";
		unset($_SESSION);
		session_unset();
		header("location:".SITE_PATH);
			}catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	function singleLoginLogic()
	{
		$result=$this->loadmodel('base','singleLoginLogic');
		if ($result == 1)
			echo "You are logged Out";
	}
	function __call($key,$index) {
		header("location:".SITE_PATH."404.php?param=internalMethodError");
		echo "yeah error";
	}
	
	function registeration()
	{
		$this->loadView("header");
		$this->loadView("confirmregister");
	}
	
	function loadLogin()
	{
		$this->loadView("header");
		$this->loadView("confirm_login");
	}
}
?>
