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
 *          @modified-by praveen pandey
 *          @modification-date
 *          ...
 *
 */


/* constants of class validation.php. this is server side validation class*/

define('VALID_EMAIL','valid email');
define('INVALID_EMAIL','INCORRECT EMAIL,please Enter email in valid format');
define('INVALID_URL','INCORRECT URL,you have not entered valid url');
define('VALID_URL','url is valid');
define('VALID_IP','This IP address is considered valid.');
define('INVALID_IP','INCORRECT IP, This IP address is not valid');
define('REQUIRED','please enter a value');
define('NOT_REQUIRED','initially field would be blank');
define('ALPHABETIC','valid value');
define('NON_ALPHABETIC','value should be alphabatic');
define('ALPHANUMERIC','value is valid');
define('NON_ALPHANUMERIC','please enter alphanumeric values');
define('VALID_SPECIALCHAR','value are in special characters ');
define('INVALID_SPECIALCHAR','please enter special character values');
define('VALID_FLOAT','you have entered valid float');
define('INVALID_FLOAT','please enter valid float value');
define('VALID_INT','you have entered valid integer');
define('INVALID_INT','please enter valid integer');
define('INVALID_USERNAME','INCORRECT User Name,only alphanumeric, dot & underscore are permitted');
define('INVALID_CNAME','INCORRECT Certificate Name,only alphanumeric, dot & spaces are permitted');
define('UNAME_LENGTH','INCORRECT User Name,Length must be between 5-20 characters');
define('UNAME_VALUE','INCORRECT User Name,Enter a value');
define('CNAME_VALUE','INCORRECT Certificate Name,Enter a value');
define('INVALID_PASS','INVALID password');
define('INVALID_PASS_LENGTH','INCORRECT password,length must be between 6 and 20 char');
define('INVALID_PHONE','enter digits only');
define('INVALID_PHONE_LENGTH','phone no. must between 8 and 15 characters long');
define('INVALID_FNAME','INCORRECT First Name,Enter alphabats only');
define('INVALID_FNAME_LENGTH','INCORRECT First Name,Length must be between 5 and 20 character');
define('INVALID_MNAME','INCORRECT Middle Name,Enter alphabats only');
define('INVALID_MNAME_LENGTH','INCORRECT Middle Name,Length must be between 5 and 20 character');
define('INVALID_LNAME','INCORRECT Last Name,Enter alphabats only');
define('INVALID_LNAME_LENGTH','INCORRECT Last Name,Length must be between 5 and 20 character');
define('INVALID_YEAR','enter a valid year');
define('INVALID_MONTH','enter a valid month');
define('INVALID_DAY','enter a valid day');
define('INVALID_AGE','your age should be more than 18 years');
define('VALID_AGE','you have entered valid age');
define('VALID_DATE','yes date format is valid');
define('INVALID_DATE','date format is not valid');
define('INVALID_LENGTH','Enter with in the range');
define('INVALID_RANGE','Enter valid range min should be less than max');
define('INVALID_DATE_FORMAT','Enter date as YYYY-MM-DD and all should be digit');
define('ENTER_PASSWORD','Password should not be Empty');
define('INVALID_TIME','Enter the Time value in HH:MM:SS format');
define('INVALID_INPUT','Please enter valid input');
define("USER_NAME","User Name: ");
define("PASSWORD","Password: ");
define("USER_TYPE","Type Of User: ");
define("USER","User");
define("ADMIN","Admin");
define("FIRST_NAME","First Name: ");
define("LAST_NAME","Last Name: ");
define("EMAIL_ID","Email ID: ");
define("TYPE_OF_ORG","Type Of Organisation: ");
define("USER_ID","User Id");
define("USER_NAME1","User Name");
define("EDIT","Edit");
define("OPTIONS","Options");
define("DELETE","Delete");
define("TEST_FINISHED","The Test is finished Now ..");
define("NAME","Name : ");
define("EMAIL_ENROL","Email/Enroll No : ");
define("CORRECT_ANSWER","Correct Answer : ");
define("PERCENTAGE","Percentage : ");
define("ZERO_PERCENTAGE","Percentage : 0.0%");
define("RESULT_NOT_FOUND","Result Not Found");
define("FAIL","FAIL");
define("PASS","PASS");
define("RESULT","RESULT");
define("TIME_LEFT","Time Left :");
define("MARK_FOR_REVIEW","Mark for Review");
define("FINISH_TEST","FINISH TEST");
define("SHOW_ATTEMPTED","Show Attempted");
define("TEST_EMPTY","Test Empty");
define("SUCCESSFULLY_DELETED","The Test Has Been Successfully Deleted");
define("ERROR_WHILE_PROCESSING","Error Occurred While Processing Your Request.");
define("INVALID_COMMAND","Invalid Command");
define("S_NO","S. No.");
define("TEST_NAME","Test Name");
define("CREATED_ON","Created On");

define("VIEW","View");

define("NO_RECORDS_FOUND","NO RECORDS FOUND");
define("QUESTION","Question");
define("NO_QUESTIONS_FOUND","No Questions Found For This Test."); 
define("UMSG","the user has been successfully deleted");
define("UMSG1","NO USER RECORDS FOUND");
define("UMSG2","The user details has been successfully changed");
define("UMSG3","Are you sure want to delete");


/* Constants for user certificate management */

define('ISSUE_CERTIFICATE','ISSUE CERTIFICATE');
define('CREATE_CERTIFICATE','CREATE CERTIFICATE');
define('SELECT_TEST','Select Test');
define('ENT_CERTIFICATE_NAME','Enter Certificate Name'); 
define('LIMT_30_CHAR','Limit 30 characters'); 
define('LIMT_100_CHAR','Limit 100 characters');
define('CUST_CERTIFICATE','Customize Certificate'); 
define('DESC_CERT','Description of certificate to:');
define('SAVE_CERT','Save certificate');
define('PRESENTED_TO','Presented to:');
define('CERT_ACHIEVEMENT','Certificate of Achievement');
define('DEMO_NAME','Dean Winchester');
define('SERIAL_No','S.NO.');
define('CERT_CREATED_MSG','created certificate successfully');
define('CERT_NOT_CREATED_MSG','could not create certificate');
define('TEST','Test');
define('OPTION','Option');
define('NO_RECORD','No Record Exists');
define('ISSUE_CERT','Issue Certificate');
define('CERT_MAILED_MSG','Your certificate has been send. Kindly find the attachment');
define('CERT_MAILED_SUBJECT','Test Scheduler Certificate');
define('CERT_ISSUE_FAILED_MSG','Could not issuecertificate');
define('NO_CERTIFICATE_MSG','No Certificate is available for this test. Please create certificate first');
?>
