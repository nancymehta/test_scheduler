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
	// This is the main function which calls other functions
	function manageCategory() {
	try {
		//print_r($_SESSION);
		if(isset($_REQUEST['categoryName'])) 	//This is to Add Category
			{
				$ArrArgs['cat_name']		=	$_REQUEST['categoryName'];
				$ArrArgs['user_id']		=	$_SESSION['SESS_USER_ID'];
				$ArrData	=	$this->loadModel('category','addCategory',$ArrArgs);
				if($ArrData=="done")
				{
					header("location:".SITE_PATH."category");
				
				}
			}
			
		//This is to update the categoery
			if(isset($_REQUEST['id'])&&isset($_REQUEST['cat_name']))
			{
				$arrArgs['cat_name']	=	$_REQUEST['cat_name'];
				$arrArgs['id']	=	$_REQUEST['id'];
				$arrArgs['user_id']		=	$_SESSION['SESS_USER_ID'];
				
				$arrData	=	$this->loadModel('category','updateCategory',$arrArgs);
				if($arrData=="done")
				{
					header("location:".SITE_PATH."category");
				}else{
					echo $arrData;
				}
			}elseif(isset($_REQUEST['id']))	//This is to delete the category
			{
				$arrArgs	=	$_REQUEST['id'];
				 
				$arrData	=	$this->loadModel('category','deleteCategory',$arrArgs);
				if($arrData=="done")
				{
					header("location:".SITE_PATH."category");
				}else{
					echo $arrData;
				}
			}
		
			
		} catch (Exception $e) {
			$this->handleException($e->getMessage());
		}
	}
	
	//Default Function	
	function home() {
		$ArrData	=	$this->loadModel('category','viewCategory');

	 	$this->loadView("header");
	 	$this->loadView("user_examiner_view/deshboard_menu");
	 	$this->loadView("user_examiner_view/category",$ArrData);
	 }
	
}
