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
 *          @modified-by prince pandey,deepika solanki,praveen pandey
 *          @modification-date
 *          ...
 *
 */


ini_set("display_errors","1");
include '';
class validation
{
	
	/* this function is written to check the valid emails.
	 * @param $text(string)
	* @return type : string
	* */
	function checkEmail($text)   
	{
	if (!filter_var($text, FILTER_VALIDATE_EMAIL)) 
	{
		return VALID_EMAIL;
	}else
	{
		return INVALID_EMAIL;
		}
	}
	
	/* this function is written to check the valid URL.
	 * @param $url (string)
	* @return type : string
	* */
	
	function checkURL($url)    
	{
		if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url))
		{
			return INVALID_URL;
		}
		else
		{
			return VALID_URL;
		}
	}
	
	/* this function is written to check the ip address of your pc .
	 * @param $ip (string)
	* @return type : string
	* */
	
	public function checkIP($ip)         
	{
		if (filter_var($ip, FILTER_VALIDATE_IP))
		{
			return VALID_IP;
		}else
		{
			return INVALID_IP;
		}
	}
	
	/* this function is written to check the values that are required. 
	 * @param $var (string)
	 * @return type : string
	 * */
	public function checkRequired($var) 
	{
		if($var == '')
		{
			return REQUIRED;
		}
		else
		{
			return NOT_REQUIRED;
		} 
	}
	
	/* this function is written to check the lenght of input given.
	 * @param $var (int)
	* @return type : integer
	* */
	public function countLenght($var)               // 
	{
		$length=strlen($var);
		
		return $length;
	}
	
	/* this function is written to check the only alphabatic inputs.
	 * @param $var (string)
	* @return type : string
	* */
	public function validateAlphabate($var)   
	{
		$alpha='/^[a-zA-Z]+$/';
		if(preg_match($alpha,$var))
		{
			return ALPHABETIC;
			 
		}
		else
		{
			return NON_ALPHABETIC;
		}
	}
	/* this function is written to check the only alphanumeric inputs.
	 * @param $var (string)
	* @return type : string
	* */
	public function validateAlphaNumeric($var)  
	{
		$alpha='/^[a-zA-Z0-9]+$/';
		if(preg_match($alpha,$var))
		{
			return ALPHANUMERIC;
	
		}
		else
		{
			
			return NON_ALPHANUMERIC;
		}
	}
	/* this function is written to check the special characters given as inputs.
	 * @param $val (string)
	* @return type : string
	* */
	function checkSpecialChar($val)  
	{
		$specialchar='/[^\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		if(preg_match($specialchar,$val))
		{
			return VALID_SPECIALCHAR;
		}
		else
		{
			return INVALID_SPECIALCHAR;
		}
		 
	}
	/* this function is written to check the valid character for username.
	 * @param $str (string)
	* @return type : string
	* */
	
function validateUsername($str)
	{
		$pattern='/^[A-Za-z0-9._]+$/';
		if(!$str == '')
		{
			$strLength=strlen($str);
			if(($strLength >= 5)&&($strLength <= 30))
			{
				$pattern='/^[A-Za-z0-9.]+$/';
				if(preg_match($pattern,$str)){
				} else {
					return INVALID_USERNAME;
				  }
			} else {
				return UNAME_LENGTH;
			  }
		} else {
			return UNAME_VALUE;
		  }
	}
	
	/* this function is written to check the correct password.
	 * @param $pass (string)
	* @return type : string
	* */
function validatePassword($pass){
		$passLength=strlen($pass);
		if($passLength >=6 && $passLength <= 20){
		   $str=$pass;
		   $pattern='/^[a-zA-Z0-9\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/';
		   if(preg_match($pattern,$str)){
		   }else{
			return INVALID_PASS;
		   }
		}else{
			echo INVALID_PASS_LENGTH;
		}
	
	}
	
	/* this function is written to check the float values.
	 * @param $val (float)
	* @return type : float
	* */
	function checkFloat($val) // 
	{
	if(is_float($val))
			{
				return VALID_FLOAT;
			}else
			{
				return INVALID_FLOAT;
			}
				
	}
	
	/* this function is written to check the integer values.
	 * @param $val (int)
	* @return type : integer
	* */
	function checkInt($val)     // 
	{
		$min = 0;
		$max = 2147483647;
		if(filter_var($val, FILTER_VALIDATE_INT, array(
		"options" => array("max_range"=> $max )
		   )
			 ) === FALSE)
	
		{
	
			return  VALID_INT;
	
		}
		else
		{
			return INVALID_INT;
		}
	
	}

	/* this function is written to check the valid values given as phone no.
	 * @param $num (int)
	* @return type : integer
	* */
function phone($num) {
				$phoneLength = strlen($num);
				if($phoneLength >= 8 && $phoneLength <= 15){
					$pattern='/^[0-9]+$/';
					if(preg_match($pattern,$num)){
						
					}else{
						return INVALID_PHONE;
					}
				}else{
					return INVALID_PHONE_LENGTH;
				}
			}
			
			
			/* this function is written to check the values given to first name field .
			 * @param $str (string)
			* @return type : string
			* */
function firstName($str){
			    $len=strlen($str);
				if ($len >= 5 &&  $len <= 20){
				    $alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str)){
					}else{
						return INVALID_FNAME;
					}
				}else{
					return INVALID_FNAME_LENGTH;
				}
			}
			
			
			/* this function is written to check the values given to middle name field.
			 * @param $str (string)
			* @return type : string
			* */
function middleName($str){
			
				$len=strlen($str);
				if ($len >= 5 &&  $len <= 20){
				    $alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str)){
					}else{
						return INVALID_FNAME;
					}
				}else{
					return INVALID_FNAME_LENGTH;
				}
			}
			
			
			/* this function is written to check the values given to last name field
			 * @param $str (string)
			* @return type : string
			* */
function lastName($str){
				$len=strlen($str);
				if ($len >= 5 &&  $len <= 20){
				    $alpha='/^[a-zA-Z]+$/';
					if(preg_match($alpha,$str)){
					}else{
						return INVALID_FNAME;
					}
				}else{
					return INVALID_FNAME_LENGTH;
				}
			}
			
			/* this function is written to check the valid date format
			 * @param $input (string)
			* @return type : string
			* */
			function dateValidator($input)    
			{
				$date_format = 'Y-m-d';
				$input = trim($input);
				$dateValidate=explode("-", $input);
			
				if( $dateValidate[2] >=1 &&  $dateValidate[2] <= 31)
				{
					
					if( $dateValidate[1] >=1 &&  $dateValidate[1] <= 12)
					{
						
			
						$yearLength=strlen( $dateValidate[0]);
						if($yearLength ==4 &&  $dateValidate[0] >=1900 &&  $dateValidate[0] <= 2012)
						{
							
			
						}
						else
						{
							return INVALID_YEAR;
						}
					  
					}
					else
					{
						return INVALID_MONTH;
					}
			
				}
				else
				{
					return INVALID_DAY;
				}
				
				$time = strtotime($input);
					
				$is_valid = date($date_format, $time) == $input;
					
				print "Valid? ".($is_valid ? VALID_DATE : INVALID_DATE);
			}
				
			/* this function is written to check the valid age
			 * @param $birthDate (string)
			* @return type : string
			* */
function ageValidator($birthDate){
					$birthDate = explode("/", $birthDate); 
					if ($birthDate[0] >=1 && $birthDate[0] <= 31){
						if($birthDate[1] >=1 && $birthDate[1] <= 12){
							$yearLength=strlen($birthDate[2]);
							if($yearLength ==4 && $birthDate[2] >=1900 && $birthDate[2] <= 2012){
							
							}else{
								return INVALID_YEAR;
							}
			            }else{
							return INVALID_MONTH;
			            }
		            }else{
						return INVALID_DAY;
		            }
					
					
					$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
					echo "Age is:".$age;
					if($age<=18){
						return INVALID_AGE;
					}else{
						 return VALID_AGE;
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
//$answer	=	$obj->dateValidator('2009-03-003');
//$answer	=	$obj->ageValidator("12/17/1983");
echo $answer;
?>


