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
define('UNAME_LENGTH','INCORRECT User Name,Length must be between 5-20 characters');
define('UNAME_VALUE','INCORRECT User Name,Enter a value');
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

 /* constants admin dashboard menu.php*/
define('DASH_UMGT','User Management');
define('DASH_TMGT','Test Management');
define('FEED','feedback');
define('HOME','Home');

/* constants feedbackmanagement.php*/
define('ID','id');
define('EMAIL','Email');
define('DESCRIPTION','Description');

/* constants user_examiner_view/feedbackmanagement.php*/
define('BULK_UP','BulkUpload :');
define('ERROR_LOG','Errors Log:');

/* constants user_examiner_view/dashboard_menu.php*/
define('MY_TEST','My Tests');
define('QUES_BANK','Question Bank');
define('CATEGORIES','categories');
define('CERTI','certificates');
define('ASSIGN','Assign');
define('RESULTS','Results');
define('TEST','Test');
define('FAQ','Faq');
define('ACC_SETTING','Account Settings');

/* constants user_examiner_view/category.php*/
define('CAT_CREATE','Create new Category');
define('CAT_NAME','Category Name');
define('CAT','Category');

/* constants user_examiner_view/displayresultajax.php*/
define('OALL_PER','OverAll Result');
define('SCORE','Score');
define('DURATION','Duration');
define('ATTEMPT','Attempt');
define('VIEW_RES','View Result');

/* constants user_examiner_view/edit_test.php*/
define('CAT_TYPE','Category Type :');

/* constants user_examiner_view/edit_profile.php*/
define('','');
define('EMAIL_ST','Email Status:');
define('CNTRY','Country:');
define('DISP_NAME','Display Name:');
define('YR_NAME','Your Name');
define('YR_UNAME','Your User Name');
define('YR_PASS','Your Password');
define('YR_EMAIL','Your Email');
define('VERY_N_VERY','Verified / Not Verified');
define('YR_Country','Your Country');
define('DISP_FNAME','display your first name');
define('EPROF_MSG1','Click to view Registered users under my account');
define('EPROF_MSG2','You currently have 1000 user places available to use.

	All accounts can have up to 1000 users registered at once under their Registered user groups.

	You can add, edit or delete users at any time under the Users section within your Registered user groups.');
define('EPROF_MSG3','You may also have unused user places (registration codes) under your Registered user groups which can be deleted to make room for more user places in your groups. 
	 You can delete non-active registered users to free up available user places.');
define('EPROF_MSG4','Direct link testing allows for testing of an unlimited number of users based on your available test credits (see above: Account plans & usage).');
define('CLICK_VERIFY_MAIL','Click to Verify extra email addresses');
define('NOTE1','You can use alternate email addresses to have your Direct link test results sent to. Choose which email to use for each group via the Assign section when assigning a test or editing settings.

	Only upgraded accounts can add new email addresses.');
define('CLICK_TO_CLOSE','Click to Close account');
define('NOTE2','You can close your ClassMarker account at any time and all your data will be removed from our database.
     You must verify your login user name and password to close your account.');
define('NOTE3','Closing your account is permanent and cannot be undone');
define('MSG_CLOSE_ACCOUNT','Reasons for closing your Account?');
define('NOTE4','Please be patient once you select the link below. 
	Closing your account can take a few moments.');
define('HEADING_FOR_DETAILS','View and edit my details:');
define('CLICK_VIEW_PROFILE','Click to view my profile');

/* constants user_examiner_view/exametting.php*/
define('EXAM_STTING','Exam setting');
define('RANDOM','Random');
define('START_TIME','Start Time');
define('END_TIME','End Time');
define('TEST_DURA','Test Duration (mins)');
define('PER_PAGE_QUES','Per Page Questions');
define('PASS_MARK','Passing Marks');
define('EMAIL_SCORE','Email Score');
define('CREATE_NEW_TEST','Create new test');

/* constants user_examiner_view/maketetpage.php*/
define('TEST_LINK','Test Link');

/* constants user_examiner_view/managecertificate.php*/
define('CERTI_NAME','Certificate name');
define('LIMIT_30CHR','Limit 30 characters');
define('CUSTOMIZE_CERTI','Customize Certificate');
define('CERTI_OF_ACHIEVE','Certificate of Achievement');
define('PRESENTED_TO','Presented to:');
define('DES_CERTI','Description of certificate to:');
define('LIMIT_100CHR','Limit 100 characters.');

/* constants user_examiner_view/managequestion.php*/
define('QES_CAT_SETT','Question/Category Settings');
define('TESTS_NAME','Test name');
define('NO_OF_QUES','No of Question');

/* constants user_examiner_view/manageTEST.php*/
define('MGT_TEST','Manage Test');
define('RAND_QUES','Random Questions');
define('SET_RAND_QUES','Set random questions');
define('MGT_TEST_MSG1','Random question settings are optional. Do not add');
define('STATIC_QUES','Static questions');
define('MGT_TEST_MSG2','to this test if you want all questions to be randomly chosen each time it is taken.');
define('MGT_TEST_MSG3','As the questions selected for this test will change each time the test is taken');
define('TOT_POINTS_AVAIL','Total points available');
define('MGT_TEST_MSG4','cannot be calculated in advance.');
define('MGT_TEST_MSG5','If you add questions to this test yourself manually (referred to as');
define('STATIC_QUESTION','Static questions');
define('MGT_TEST_MSG6','they will not be used again when ClassMarker selects random questions from your question bank.');
define('MGT_TEST_MSG7','Use either Option 1 or Option 2, not both.');
define('OPT1','Option 1');
define('MGT_TEST_MSG8','Select the total number of questions randomly chosen from selected categories.');
define('MGT_TEST_MSG9','Questions will display in random order irrespective of their categories');
define('OPT1_SETT','View option 1 settings');
define('TOT_NO_OF_QUES','Total number of questions');
define('FROM_CAT','From categories:');
define('GENERIC','Generic');
define('OPT2','Option 2');
define('MGT_TEST_MSG10','Select a specific number of questions per category to be randomly chosen.');
define('MGT_TEST_MSG11','Allows ordering and grouping questions by category.');
define('OPT2_SETT','View option 2 settings');
define('QUES_PER_CAT','No. questions per category');
define('RAND_QUES_ORDER','Random question ordering');
define('MGT_TEST_MSG12','Display random questions grouped and ordered by the category ordering above');
define('DISP_QUES_RAND','Display questions in random order');
define('MGT_TEST_MSG13','Display questions grouped and ordered by categories above');
define('CLICK_USE_CERTI','click to use certificate');
define('CERTIFICATES','Certificates');
define('MGT_TEST_MSG14','You can allow users to download a certificate when they complete their test.');
define('CERTI_CREATE','Create a certificate');
define('MGT_TEST_MSG15','Now each time you');
define('MGT_TEST_MSG16','Assign a test');
define('MGT_TEST_MSG17','you can select a certificate to be used.');
define('MGT_TEST_MSG18','* Certificates are optional.');

/* constants user_examiner_view/recentresult.php*/
define('USER_SEARCH','User search');
define('FILL_MORE_FIELDS','Fill one or more fields');
define('EMAIL_ADDR','Email Address');
define('RECENT_RES','Recent Test Results');
define('NO_RECENT_RES','No Recent Results');
define('RECENT_MSG1','This page will display recent test results.');

/* constants user_examiner_view/result_by_group.php*/
define('GRP_RESULT','Overall Group Results');
define('USR_GRP_RES','Registered user groups results');
define('GRP_NAME','Group Name');
define('DEMO','Demo');
define('DISP_RES','Result to be displayed');
define('DUMMY','Dummy');
define('RESBYGRP_MSG1','You have no results at present');

/* constants user_examiner_view/single_upload.php*/
define('ADD_MARE_QUES','Add More Question');
define('SHOW_QUES_CATWISE','Show question Category wise');
define('QUES_TYPE','Question type:');
define('MCQ','mcq');
define('T_F','true/false');
define('TYPE_QUES_HERE','Type Qestion here:');
define('CLICK_TO_ADD_QUES','Click to add option');
define('ADD_OPT_HERE','Add Options Here');
define('ANSWER','Answer');
define('FEEDBACK','Feedback');


/* constants user_examiner_view/single_upload.php*/
define('VIEW_QUES_CATWISE','View question categorywise');

/* constants user_examiner_view/usersoverallresult.php*/

define('SELECT_TEST','Select Test');

/* constants user_examiner_view/user_result.php*/
define('IP_ADD','Ip Address :');
define('Id  Assigned  :','IP_ASSIGN');
define('DATE_STARED','Date Started :');
define('DATE_FINISH','Date Finished : ');
define('TEST_TAKER_NAME','Name of Exam Taker :');


/* constants user_examiner_view/user_header.php*/
define('scheduler','SCHEDULER');
define('WELCOME_USER','Welcome User');

/* constants user_examiner_view/test_by_result.php*/
define('OALL_TEST_RES','Overall Test Results');
define('FILTER_TEST_BYCAT','Filter tests by category:');
define('SHOW_ALL_TEST','Show all test');
define('GENERIC_TEST','Generic test');
define('OALL_RES','Overall Results');
define('ABOUT_TEST_RES','About test results');
define('RE_BY_TEST_MSG1','Results on this page are calculated as an average from your Registered user groups and Direct link testing combined.');
define('RE_BY_TEST_MSG2','Tests that are currently');
define('RE_BY_TEST_MSG3','In progress');
define('RE_BY_TEST_MSG4','are not included.');
define('RE_BY_TEST_MSG5','Results on this page are updated every');
define('RE_BY_TEST_MSG6','10 minutes.');
define('RE_BY_TEST_MSG7','Recent results may not appear.');
define('RE_BY_TEST_MSG8','Export these results to tab separated Excel(TM) format.');
define('DISP_OPT','Display options');
define('ORDER_F_TO_L','Order First to Last');


/* constants user_examiner_view/user_test_info.php*/































?>
