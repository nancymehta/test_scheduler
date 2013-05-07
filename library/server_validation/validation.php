<?php 

/**
 * @classname Validation
 *
 * This class contain all methods that describes all the functionality of validating the fields and thier corresponding values....
 *
 * @package Zend_Magic
 *
 * @author Praveen Kumar pandey
 *         @date 07-05-2013
 * @version version - 2
 *          @modified-by Abhishek Arora,prince pandey,deepika solanki,praveen pandey
 *          @modification-date
 *          ...
 *
 */


ini_set("display_errors","1");
class validation
{
	function checkEmail($text)  // this function is written to check the valid emails. 
	{
	if (!filter_var($text, FILTER_VALIDATE_EMAIL)) 
	{
		return "Not Valid Email";
	}else{
		return "Valid Email";
		}
	}
	
	function checkURL($url)     // this function is written to check the valid URL.
	{
		if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url))
		{
			return "Not Valid URL";
		}else{
			return "Valid URL ";
		}
	}
	
	
	
	public function checkIP($ip)         // this function is written to check the ip address of your pc .
	{
		if (filter_var($ip, FILTER_VALIDATE_IP))
		{
			return "This IP address is considered valid.";
		}else
		{
			return "This IP address is not valid.";
		}
	}
	
	public function checkRequired($var) // this function is written to check the values that are required.
	{
		if($var == '')
		{
			return "enter a value";
		}
		else
		{
			return "right";
		} 
	}
	
	public function countLenght($var)               // this function is written to check the lenght of input given.
	{
		$length=strlen($var);
		
		return $length;
	}
	
	
	public function validateAlphabate($var)  // this function is written to check the only alphabatic inputs.
	{
		$alpha='/^[a-zA-Z]+$/';
		if(preg_match($alpha,$var))
		{
			return "it is alphabate";
			 
		}
		else
		{
			return "it not  alphabate";
		}
	}
	
	public function validateAlphaNumeric($var) // this function is written to check the only alphanumeric inputs.
	{
		$alpha='/^[a-zA-Z0-9]+$/';
		if(preg_match($alpha,$var))
		{
			return "it is alphanumeric";
	
		}
		else
		{
			
			return "it not  alphanumeric";
		}
	}
	function checkSpecialChar($var)  // this function is written to check the special characters given as inputs.
	{
		$specialchar='/[^\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		if(preg_match($specialchar,$var))
		{
			return "not special char";
		}
		else
		{
			return "special char";
		}
		 
	}
	
	function validateUserame($str)    // this function is written to check the valid character for username.
	{
		//$pattern='/^[A-Za-z0-9._]+$/';
		$pattern='/^[A-Za-z0-9._]{5,30}$/';
		if(preg_match($pattern,$str))
		{
			return "</br>Valid user Name";
		}
		else
		{
			return "</br>Invalid user Name";
		}
	}
		
	public function validatePassword($pass)
	{
		$str=$pass;
		$pattern='/^[a-zA-Z0-9\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]{6,20}$/';
		if(preg_match($pattern,$str))
		{
			return "valid password";
		}
		else
		{
			return "invalid password ";
		}
	
	}
	
	
	function checkFloat($val) // this function is written to check the float values.
	{
	if(is_float($val))
			{
				return " </br>$val is a valid float";
			}else
			{
				return "</br>$val is not a valid float";
			}
				
	}
	
			 
	function checkInt($val)     // this function is written to check the integer values.
	{
		$min = 0;
		$max = 2147483647;
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

			function phone($num)  // this function is written to check the valid values given as phone no.
			{
				if(strlen($num)==10)
				{
					$pattern='/^[0-9]+$/';
					if(preg_match($pattern,$num))
					{
						return "is valid phone no.";
					}
					else
					{
						return "Not valid";
					}
				}
				else
				{
					return "phone no. must be 10 characters long";
				}
			}
			
			function firstName($str)   // this function is written to check the values given to first name field .
			{
				if(isset($str)&&(strlen($str)<=30))
				{
					//$alpha='/^[a-zA-Z]+$/';
					$alpha='/^[a-zA-Z]{5,20}$/';
					if(preg_match($alpha,$str))
					{
						return "valid first name";
					}
					else
					{
						return "Invalid first name";
					}
				}
				else
				{
					return "Length must be less than 30 character ";
				}
			}
			function middleName($str)  // this function is written to check the values given to middle name field
			{
				if(isset($str)&&(strlen($str)<=20))
				{
					//$alpha='/^[a-zA-Z]+$/';
					$alpha='/^[a-zA-Z]{5,20}$/';
					if(preg_match($alpha,$str))
					{
						return "valid middle name";
					}
					else
					{
						return "Invalid middle name";
					}
				}
				else
				{
					return "Length must be less than 20 character ";
				}
			}
			function lastName($str)    // this function is written to check the values given to last name field
			{
				if(isset($str)&&(strlen($str)<=20))
				{
					//$alpha='/^[a-zA-Z]+$/';
					$alpha='/^[a-zA-Z]{5,20}$/';
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
			
			
			function dateValidator($input)     // this function is written to check the valid date format
			{
			$date_format = 'Y-m-d';
			 
			
			$input = trim($input);
			$time = strtotime($input);
			
			$is_valid = date($date_format, $time) == $input;
			
			print "Valid? ".($is_valid ? 'yes date format is valid' : 'date format is not valid');
			}
			
			function ageValidator($birthDate)    // this function is written to check the valid age
			{
				$birthDate = explode("/", $birthDate);  //explode the date to get month, day and year
				
				//get age from date or birthdate
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
				echo "Age is:".$age;
				if($age<=18)
				{ 
					return "</br>your age should be more than 18 years";
				}
				else 
				{
					return "</br>you have entered valid age";
				}
			}
	}
	


$obj	=	new validation();

//$answer	=	$obj->checkEmail("sgdsg123@osscube.com");
//$answer	=	$obj->checkURL("HTTP://www.osscube.com");
//$answer	=	$obj->checkIP("192.168.156.75");
//$answer	=	$obj->checkRequired(12);
//$answer	=	$obj->countLenght(100);
//$answer	=	$obj->validateAlphabate();
//$answer	=	$obj->validateAlphaNumeric("aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaasdfghjkl1234567890sdfghjkl");
//$answer	=	$obj->checkSpecialChar("!@#$%!@#$%^&*()!@#$%^&*())!@#$%^&*(^&*");
//$answer	=	$obj->validateUserame("!@#$%^&");
//$answer	=	$obj->validatePassword("fVB75896%$");
//$answer	=	$obj->checkFloat(.123456);
//$answer	=	$obj->checkInt("1123234567845");
//$answer	=	$obj->phone("");
//answer	=	$obj->firstName("qwerrwea");
//$answer	=	$obj->middleName("");
//$answer	=	$obj->lastNameName("");
//$answer	=	$obj->dateValidator('2009-03-03');
$answer	=	$obj->ageValidator("12/17/1983");
echo $answer;
?>


