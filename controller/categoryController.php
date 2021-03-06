<?php

/**
 * @classname            categoryCotroller
 *
 * This class is used to manage the categories such as to add, update and delete.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 08-05-2013
 * @version              version - 1
 * ...
 */


include SITE_ROOT.'controller/mainController.php';
class categoryController extends mainController {
	
	public $validationObj;
	//Making the object of validation Class
	public function __construct()
	{
		$this->validationObj	=	new validation();
	}
	
	// This is the main function which calls other functions
	function manageCategory() {
	try {
		
		if(isset($_POST['categoryName'])) 	//This is to Add Category
			{
				if($this->validationObj->validateAlphabate($_POST['categoryName']))
				{
				$ArrArgs['catName']		=	strip_tags($_POST['categoryName']);
				}else {
					header("location:".SITE_PATH."category/home");
					die();
				}
				$ArrArgs['userId']		=	$_SESSION['SESS_USER_ID'];
				$ArrData	=	$this->loadModel('category','addCategory',$ArrArgs);
				if($ArrData=="done")
				{	
					$_SESSION['SESS_ERROR']	=	"Category has been added";
					header("location:".SITE_PATH."category");
				
				}
			}
			
			if(isset($_GET['id'])&&isset($_GET['catName']))
			{
				if($this->validationObj->validateAlphabate($_REQUEST['catName']))
				{
				$arrArgs['catName']		=	strip_tags($_GET['catName']);
				}else {
					header("location:".SITE_PATH."category/home");
					die();
				}
								
				$arrArgs['id']			=	strip_tags($_GET['id']);
				$arrArgs['userId']		=	$_SESSION['SESS_USER_ID'];
				
				$arrData	=	$this->loadModel('category','updateCategory',$arrArgs);
				if($arrData=="done")
				{
					$_SESSION['SESS_ERROR']	= "Category Updated";
					header("location:".SITE_PATH."category/home");
				}else{
					echo $arrData;
				}
			}elseif(isset($_GET['id']))	//This is to delete the category
			{
				$arrArgs	=	$_GET['id'];
				 
				$arrData	=	$this->loadModel('category','deleteCategory',$arrArgs);
				if($arrData=="done")
				{	$_SESSION['SESS_ERROR']	= "Category Deleted";
					header("location:".SITE_PATH."category");
				}else{
					echo $arrData;
				}
			}
		
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	//Default Function	Which load the view of all categories
	function home() {
		$userId		=	$_SESSION['SESS_USER_ID'];
		
		$ArrData	=	$this->loadModel('category','viewCategory',$userId);

	 	$this->loadView("header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category",$ArrData);
	 }
	
}
