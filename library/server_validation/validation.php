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
include_once 'lang.en.php';
class validation
{
	
	/* this function is written to check the valid emails.
	 * @param $text(string)
	* @return type : boolean
	* */
	public function checkEmail($text)   
	{
		if (filter_var($text, FILTER_VALIDATE_EMAIL)) {
			return true;
		}
		else
		{
			echo INVALID_EMAIL;
			return false;
		}
	}
	
	
	/* this function is written to check the valid URL.
	 * @param $url (string)
	* @return type : boolean
	* */
	public function checkURL($url)    
	{
		if (!preg_match('|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $url)){
			echo INVALID_URL;
			return false;
		} else {
			return true;
		  }
	}
	
	
	/* this function is written to check the ip address of your pc .
	 * @param $ip (string)
	* @return type : boolean
	* */
	public function checkIP($ip)         
	{
		if (filter_var($ip, FILTER_VALIDATE_IP)){
			return true;
		} else {
			echo INVALID_IP;
			return false;
		  }
	}
	
	
	/* this function is written to check the values that are required. 
	 * @param $var (string)
	 * @return type : boolean
	 * */
	public function checkRequired($var) 
	{
		if($var == '')
		{
			echo REQUIRED;
			return false;
		}
		return true;
	}
	
	
	/* this function is written to check the lenght of input given.
	 * @param $var (int)
	* @return type : boolean
	* */
	public function countLenght($var)               
	{
		$length=strlen($var);
		return $length;
	}
	
	
	/* this function is written to check the only alphabatic inputs.
	 * @param $var (string)
	* @return type : boolean
	* */
	public function validateAlphabate($var)   
	{
		$alpha='/^[a-zA-Z]+$/';
		if(preg_match($alpha,$var))
		{
			return true;
		}
		else
		{
			echo NON_ALPHABETIC;
			return false;
		}
	}
	
	
	/* this function is written to check the only alphanumeric inputs.
	 * @param $var (string)
	* @return type : boolean
	* */
	public function validateAlphaNumeric($var)  
	{
		$alpha='/^[a-zA-Z0-9]+$/';
		if(preg_match($alpha,$var))
		{
			return true;
		}
		else
		{
			echo NON_ALPHANUMERIC;
			return false;
		}
	}
	
	
	/* this function is written to check the special characters given as inputs.
	 * @param $val (string)
	* @return type : boolean
	* */
	public function checkSpecialChar($val)  
	{
		$specialchar='/[^\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
		if(preg_match($specialchar,$val))
		{
			return true;
		}
		else
		{
			echo INVALID_SPECIALCHAR;
			return false;
		}	 
	}
	
	
	/* this function is written to check the valid character for username.
	 * @param $str (string)
	* @return type : boolean
	* */
	public function validateUsername($str)
	{
		$pattern='/^[A-Za-z0-9._]+$/';
		if(!$str == '')
		{
			$strLength=strlen($str);
			if(($strLength >= 5)&&($strLength <= 30))
			{
				$pattern='/^[A-Za-z0-9.]+$/';
				if(preg_match($pattern,$str))
				{
					return true;
				} 
				else 
				{
					echo INVALID_USERNAME;
					return false;
				}
			}
			else 
			{
				echo UNAME_LENGTH;
				return false;
			}
		}
		else 
		{
			echo UNAME_VALUE;
			return false;
		}
	}
	
	
	/* this function is written to check the correct password.
	 * @param $pass (string)
	* @return type : boolean
	* */
	public function validatePassword($pass)
	{
		if(!$pass == '')
		{
			$passLength=strlen($pass);
			if($passLength >=6 && $passLength <= 20)
			{
			   $str=$pass;
			   $pattern='/^[a-zA-Z0-9\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]+$/';
			   if(preg_match($pattern,$str))
			   {
			   	return true;
			   }
			   else
			   {
				echo INVALID_PASS;
				return false;
			   }
			}
			else
			{
				echo INVALID_PASS_LENGTH;
				return false;
			}
		} else {
			echo ENTER_PASSWORD;
			return false;
		}
	}
	
	
	/* this function is written to check the float values.
	 * @param $val (float)
	* @return type : boolean
	* */
	public function checkFloat($val)
	{
		if(is_float($val))
		{
			return true;
		}
		else
		{
			echo INVALID_FLOAT;
			return false;
		}
	}
	
	
	/* this function is written to check the integer values.
	 * @param $val (int)
	* @return type : boolean
	* */
	public function checkInt($val)
	{
		$min = 0;
		$max = 2147483647;
		if(filter_var($val, FILTER_VALIDATE_INT, array(
				"options" => array("max_range"=> $max )
		   			 )
		  ) === FALSE)
	
		{
			return true;
		}
		else
		{
			echo INVALID_INT;
			return false;
		}
	}

	
	/* this function is written to check the valid values given as phone no.
	 * @param $num (int)
	* @return type : boolean
	* */
	public function phone($num) 
	{
		$phoneLength = strlen($num);
		if($phoneLength >= 8 && $phoneLength <= 15)
		{
			$pattern='/^[0-9]+$/';
			if(preg_match($pattern,$num))
			{
				return true;
			}
			else
			{
				echo INVALID_PHONE;
				return false;
			}
		}
		else
		{
			echo INVALID_PHONE_LENGTH;
			return false;
		}
	}
			
			
	/* this function is written to check the values given to first name field .
	* @param $str (string)
	* @return type : boolean
	* */
	public function firstName($str)
	{
		$len=strlen($str);
		if ($len >= 5 &&  $len <= 20)
		{
			$alpha='/^[a-zA-Z]+$/';
			if(preg_match($alpha,$str))
			{
				return true;
			}
			else
			{
				echo INVALID_FNAME;
				return false;
			}
		}
		else
		{
			echo  INVALID_FNAME_LENGTH;
			return false;
		}
	}
			
	
	/* this function is written to check the values given to middle name field.
	* @param $str (string)
	* @return type : boolean
	* */
	public function middleName($str)
	{
		$len=strlen($str);
		if ($len >= 5 &&  $len <= 20)
		{
			$alpha='/^[a-zA-Z]+$/';
			if(preg_match($alpha,$str))
			{
				return true;
			}
			else
			{
				echo INVALID_FNAME;
				return false;
			}
		}
		else
		{
			echo INVALID_FNAME_LENGTH;
			return false;
		}
	}
	
			
	/* this function is written to check the values given to last name field
	* @param $str (string)
	* @return type : boolean
	* */
	public function lastName($str)
	{	
		$len=strlen($str);
		if ($len >= 5 &&  $len <= 20)
		{
			$alpha='/^[a-zA-Z]+$/';
			if(preg_match($alpha,$str))
			{
				return true;
			}
			else
			{
				echo INVALID_FNAME;
				return false;
			}
		}
		else
		{
			echo INVALID_FNAME_LENGTH;
			return false;
		}
	}
	
			
	/* this function is written to check the valid date format
	* @param $input (string)
	* @return type : boolean
	* */
	public function dateValidator($input)    
	{
		$date_format = 'Y-m-d';
		$input = trim($input);
		$dateValidate=explode("-", $input);
		if( ctype_digit($dateValidate[0])&&ctype_digit($dateValidate[1])&&ctype_digit($dateValidate[2])){
		if( $dateValidate[2] >=1 &&  $dateValidate[2] <= 31)
		{	
			if( $dateValidate[1] >=1 &&  $dateValidate[1] <= 12)
			{
				$yearLength=strlen( $dateValidate[0]);
				if($yearLength ==4 &&  $dateValidate[0] >=1900 &&  $dateValidate[0] <= 2012){
					return true;
				}
				else
				{
					echo INVALID_YEAR;
					return false;
				}	  
			}
			else
			{
				echo INVALID_MONTH;
				return false;
			}
		}
		else
		{
			echo INVALID_DAY;
			return false;
		}
		} else {
			echo INVALID_DATE_FORMAT;
		}

	}
	
				
	/* this function is written to check the valid age
	* @param $birthDate (string)
	* @return type : boolean
	* */
	public function ageValidator($birthDate)
	{
					
		$birthDate = explode("/", $birthDate); 
			
		if ($birthDate[0] >=1 && $birthDate[0] <= 31)
		{
			if($birthDate[1] >=1 && $birthDate[1] <= 12)
			{
					$yearLength=strlen($birthDate[2]);
					if($yearLength ==4 && $birthDate[2] >=1900 && $birthDate[2] <= 2012)
					{
							
					}
					else
					{
						echo INVALID_YEAR;
						return false;
					}
		 	}
		 	else
		 	{
				echo INVALID_MONTH;
				return false;
		 	}
		}
		else
		{	
			echo INVALID_DAY;
			return false;
		}
					
					
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md") ? ((date("Y")-$birthDate[2])-1):(date("Y")-$birthDate[2]));
		echo "Age is:".$age;
		if($age<=18)
		{
			echo INVALID_AGE;
			return false;
					
		} else {
		  }
		return true;
	}
	
	/* this function is written to check the valid age
	* @param $str (string), $min (int),$max (int)
	* @return type : boolean
	* */
	public function checkLength($str,$min,$max)
	{
		if($min<=$max){
			if((strlen($str)>=$min)&&(strlen($str)<=$max)){
				return true;
			}else{
				echo INVALID_LENGTH;
				return false;
			 }
		} else {
			echo INVALID_RANGE;
				return false;
		  }
	}	

	public function validate_time24($value)
	 {
		if(preg_match("/^([0-2][0-3]|[01]?[1-9]):([0-5]?[0-9]):([0-5]?[0-9])$/", $value)){
			return true;
		}
		else
		{
			echo INVALID_TIME;
			return false;
		}
	}
}


//$obj	=	new validation();

//$answer	=	$obj->checkEmail("sgdsgosscubefefer.com");
//$answer	=	$obj->checkURL("HTTP://www.osscube.com");
//$answer	=	$obj->checkIP("192.168.156.75");
//$answer	=	$obj->checkRequired(12);
//$answer	=	$obj->countLenght(100);
//$answer	=	$obj->validateAlphabate("@#$%^");
//$answer	=	$obj->validateAlphaNumeric("aaaaaaaaaaaaahnbh..aaaaaaaaaaaaaaaaaaaaaaaaaaaaasdfghjkl1234567890sdfghjkl");
//$answer	=	$obj->checkSpecialChar("!@#$%!@#$%^&*()!@#$%^&*())!@#$%^&*(^&*");
//$answer	=	$obj->validateUsername("!@#$%^&");
//$answer	=	$obj->validatePassword("fVB");
//$answer	=	$obj->checkFloat(.123456v czxv);
//$answer	=	$obj->checkInt(1123234vxsv567845);
//$answer	=	$obj->phone("");
//$answer	=	$obj->firstName("");
//$answer	=	$obj->middleName("");
//$answer	=	$obj->lastName("");
//$answer	=	$obj->dateValidator('20dgfs03-gergt09-1gere2');
//$answer	=	$obj->ageValidator("12/17/1983");
//$answer	=	$obj->chk_FilesUpload("https://github.com/nancymehta/test_scheduler");
//$answer=$obj->checkLength('deofjweifj',3,1);
//$answer=$obj->validate_time24('24:59:59');
//echo $answer;
?>



