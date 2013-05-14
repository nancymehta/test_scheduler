<?php

/**
 * @classname            accountSettingsController
 *
 * This class is used to manage the Account of users.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */

class accountSettingsController extends common{	
	function home() {
		try {
			$userId		=	$_SESSION['SESS_USER_ID'];
			$arrData	=	$this->loadModel('accountSettings','viewDetails',$userId);
			$this->loadView('settings_home',$arrData);
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	public $validationObj;

	//Making the object of validation Class
	public function __construct()
	{
		$this->validationObj	=	new validation();
	}

	//This is the main function which shows the options for user
	function accountSettings() {
	try {
		$this->loadView('user_account_settings');
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//This function is used to show the details to the user
	public function viewDetails() {
	try {
		$userId		=	$_SESSION['SESS_USER_ID'];
		$arrData	=	$this->loadModel('accountSettings','viewDetails',$userId);
		$this->loadView('view_user_details',$arrData);
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//This function is used to show the values to the use which can be edited and changed
	function editDetails() {
	try {
	$userId		=	$_SESSION['SESS_USER_ID'];
	$arrData	=	$this->loadModel('accountSettings','editDetails',$userId);
	$this->loadView('process_details',$arrData);
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	//This function is used to save the values of the users which are edited by them
	function processDetails() {
	try {
		
		if($this->validationObj->validateAlphabate($_REQUEST['fname']))
		{
//			echo "ok";die();
		$arrArgs['fname']	=	$_REQUEST['fname'];

		}else{
			echo "its not OK";die();
			header("location: ".SITE_PATH."accountSettings/home");
		}
//		die("here");
		if($this->validationObj->validateAlphabate($_REQUEST['lname']))
		{
		$arrArgs['lname']	=	$_REQUEST['lname'];
		}else{
			header("location: ".SITE_PATH."accountSettings/home");
		}
		
		if($this->validationObj->checkEmail($_REQUEST['email']))
		{
		$arrArgs['email']	=	$_REQUEST['email'];	
		}else{
			header("location: ".SITE_PATH."accountSettings/accountSettings");
		}
		
		$arrArgs['id']		=	$_SESSION['SESS_USER_ID'];
	
		$arrData		=	$this->loadModel('accountSettings','processDetails',$arrArgs);
	   	
		if($arrData==true)
		{
			header("location: ".SITE_PATH."accountSettings/home");
		}
		} catch (Exception $e) {
		  	$this->handleException($e->getMessage());
		} 		
	}
	
	//This function loads a page for user on which user enter old and new password for updation
	function changePassword() {
	try {
		$this->loadView('change_password');
   	
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
		
	
	//This function is used for the updation of new password
	function processChangePassword() {
	try {
		//print_r($_REQUEST);die();
		$arrArgs['id']		=	$_SESSION['SESS_USER_ID'];

		if($this->validationObj->validatePassword($_REQUEST['oldPass']))
		{
		$arrArgs['oldPass']	=	$_REQUEST['oldPass'];
		}else{
			header("location: ".SITE_PATH."accountSettings/home");
		}

		
		if($this->validationObj->validatePassword($_REQUEST['newPass']))
		{
		$arrArgs['newPass']	=	$_REQUEST['newPass'];
		}else{
			header("location: ".SITE_PATH."home");
		}
		
		
		$arrData		=	$this->loadModel('accountSettings','confirmChangePassword',$arrArgs);
		if($arrData==true)
		{
			header("location: ".SITE_PATH."accountSettings/home");
		}else{
			header("location: ".SITE_PATH."accountSettings/home");
		}
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}
	
	
	function deactivateAccount() {
	try {
		$arrArgs	=	$_SESSION['SESS_USER_ID'];
		$arrData	=	$this->loadModel('accountSettings','deactivateAccount',$arrArgs);
		if($arrData	==	true)
		{
			header("location: ".SITE_PATH."logout");
		}
   	
	} catch (Exception $e) {
	  	$this->handleException($e->getMessage());
	} 		
	}




}
