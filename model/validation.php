<?php 
ini_set("display_errors","1");
class validation
{
	function checkEmail($text)
	{
	if (!filter_var($text, FILTER_VALIDATE_EMAIL)) 
	{
		return "Not Valid Email";
	}else{
		return "Valid Email";
		}
	}
	
	function checkURL($url)
	{
		if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url))
		{
			return "Not Valid URL";
		}else{
			return "Valid URL ";
		}
	}
	
	function checkDate($text)
	{
		$test_date = $text;
		$test_arr  = explode('/', $test_date);
		if (count($test_arr) == 3) {
			if (checkdate($test_arr[0], $test_arr[1], $test_arr[2])) {
				return "Valid Date";
			} else {
				return "Problem with dates";
			}
		} else {
			return "Problem with input";
		}
	}
	
	public function checkIP($ip)
	{
		if (filter_var($ip, FILTER_VALIDATE_IP))
		{
			return "This IP address is considered valid.";
		}else
		{
			return "This IP address is not valid.";
		}
	}
	
	public function checkRequired($var){
		if($var == ''){
			return "enter a value";
		}
	}
	
	public function countLenght($var){
		
		$length=strlen($var);
		
		return $length;
	}
	
	
	public function validateAlphabate($var){
		$alpha='/^[a-zA-Z]+$/';
		if(preg_match($alpha,$var)){
			return "it is alphabate";
			 
		}else{
			return "it not  alphabate";
		}
	}
	
	public function validateAlphaNumeric($var){
		$alpha='/^[a-zA-Z0-9]+$/';
		if(preg_match($alpha,$var)){
			return "it is alphanumeric";
	
		}else{
			
			return "it not  alphanumeric";
		}
	}
	function checkSpecialChar($var){
		$specialchar='/[^\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		if(preg_match($specialchar,$var)){
			return "not special char";
		}else{
			return "special char";
		}
		 
	}
	
	function validateUserame($str)
	{
		$pattern='/^[A-Za-z0-9._]+$/';
		if(preg_match($pattern,$str)){
			return "</br>Valid user Name";
		}else{
			return "</br>Invalid user Name";
		}
	}
		
	
	
	function checkFloat($val)
	{
	if(is_float($val))
			{
				return " </br>$val is a valid float";
			}else
			{
				return "</br>$val is not a valid float";
			}
				
	}
	
			 
			function checkInt($val)
			{
			$min = 1;
			$max = 99999999999;
			if(filter_var($val, FILTER_VALIDATE_INT, array(
			"options" => array("max_range"=> $max )
			)
			) === FALSE)
	
			{
	
			return  "Invalid Integer Value";
	
			}
			else
			{
				return  "Valid Integer";
			}
	
			}

			function phone($num){
				if(strlen($num)==10){
				$pattern='/^[0-9]+$/';
				if(preg_match($pattern,$num)){
					return "is valid phone no.";
				}else{
					return "Not valid";
				}
				}else{
					return "phone no. must be 10 characters long";
				}
			}
			
			function firstName($str){
				if(isset($str)&&(strlen($str)<=30)){
					$alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str)){
						return "valid first name";
					}else{
						return "Invalid first name";
					}
				}else{
					return "Length must be less than 30 character ";
				}
			}
			function middleName($str){
				if(isset($str)&&(strlen($str)<=20)){
					$alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str)){
						return "valid middle name";
					}else{
						return "Invalid middle name";
					}
				}else{
					return "Length must be less than 20 character ";
				}
			}
			function lastName($str)
			{
				if(isset($str)&&(strlen($str)<=20))
				{
					$alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str))
					{
						return "valid last name";
					}
					else
					{
						return "Invalid last name";
					}
				}
				else
				{
					return "Length must be less than 20 character ";
				}
			}
			
			
			function dateValidator($input)
			{
			$date_format = 'Y-m-d';
			 
			
			$input = trim($input);
			$time = strtotime($input);
			
			$is_valid = date($date_format, $time) == $input;
			
			print "Valid? ".($is_valid ? 'yes' : 'no');
			}
			
			function ageValidator($birthDate)
			{
				//date in mm/dd/yyyy format; or it can be in other formats as well
				//$birthDate = "12/17/1983";
				//explode the date to get month, day and year
				$birthDate = explode("/", $birthDate);
				//get age from date or birthdate
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
				echo "Age is:".$age;
				if($age<=18)
				{ 
					echo "</br>your age should be more than 18 years";
				}
				else 
				{
					echo "</br>you have entered valid age";
				}
			}
	}
	


$obj	=	new validation();

//$answer	=	$obj->checkEmail("sgdsg123@osscube.com");
//$answer	=	$obj->checkURL("HTTP://www.osscube.com");
//$answer	=	$obj->firstName("");
//$answer	=	$obj->middleName("");
//$answer	=	$obj->lastNameName("");
//$answer	=	$obj->checkIP("192.168.156.75");
//$answer	=	$obj->countLenght(100);
//$answer	=	$obj->validateAlphaNumeric("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdfghjkl1234567890sdfghjkl");
//$answer	=	$obj->checkSpecialChar("!@#$%!@#$%^&*()!@#$%^&*())!@#$%^&*(^&*");
//$answer	=	$obj->validateUserame("!@#$%^&");
//$answer	=	$obj->checkInt("1123234567845");
//$answer	=	$obj->checkFloat(.123456);

//$answer	=	$obj->dateValidator('2009-03-03');


$answer	=	$obj->ageValidator("12/17/1983");

?>













