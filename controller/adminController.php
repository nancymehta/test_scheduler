<?php
include SITE_ROOT . 'controller/mainController.php';

class adminController extends mainController {
	public $validationObj;

	/**
	* making object of server-side: Validation Class
	*/
	public function __construct()
	{
		$this->validationObj	=	new validation();
	}

    function sendmail() {
        try{
        	if ($_POST ['contactus']) {
        		$sub = strip_tags($_POST ['contact_name']) . " <-name   email-> " . strip_tags($_POST ['contact_email']);
            	$to = "info.test.scheduler@gmail.com";
            	$body = strip_tags($_POST ['contact_suggestion']);
            	$name = strip_tags($_POST ['contact_name']);
            	$email = strip_tags($_POST ['contact_email']);
            	mailTest ( $to, $sub, $body );
            	$arrArgument = array (
                    			'name' => $name,
                    			'email' => $email,
                    			'body' => $body 
            					);
            	$this->loadModel ( "admin", "contactUs", $arrArgument );
        	}
        }catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function home() {
        try{
        	$this->usermanagement();
        }catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function usermanagement() {
        try{
        	$this->loadView ( "header" );
        	$this->loadView ( "user_header" );
       		$this->loadView ( "admin_view/admin_deshboard_menu" );
        	$userResult = $this->loadModel ( "admin", "usermanagement" );
        	$this->loadView ( "admin_view/usermanagement", $userResult );
        } catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function showUserDetails() {
    	try{
    		if (isset ( $_POST ['id'] ) && isset ( $_POST ['request'] )) {
            	if ($_POST ['request'] == 'EDIT') {
                	$userResult = $this->loadModel ( "admin", "showUserDetails", $_POST ['id'] );
                	$this->loadView ( "admin_view/showUserDetails", $userResult );
            	} else if ($_POST ['request'] == 'DELETE') {
                	$userResult = $this->loadModel ( "admin", "deleteUser", $_POST ['id'] );
            		}
        	}
    	} catch (Exception $e) {
			$this->handleException($e->getMessage());
			}
    }
    
	function editUserDetails() {
        try{
        	if (isset ( $_POST )) {
        		$arredit=array();
				if ($this->validationObj->validateUsername($_POST['username'])){
	    			$arredit['username']= strip_tags($_POST['username']);
				} else { die();
					}
				if ($this->validationObj->firstName($_POST['first_name'])){
	    			$arredit['first_name']= strip_tags($_POST['first_name']);
				} else {  die();
		  			}
				if ($this->validationObj->lastName($_POST['last_name'])){
	    			$arredit['last_name']= strip_tags($_POST['last_name']);
				} else { die();
		  			}
				if ($this->validationObj->checkEmail($_POST['email'])){
	    			$arredit['email']= strip_tags($_POST['email']);
				} else { die();
		  			}
	    		$arredit['org_type']=$_POST['org_type'];
	    		$arredit['user_type']=$_POST['user_type'];
	    		$arredit['id']=$_POST['id'];
            	$userResult = $this->loadModel ( "admin", "editUserDetails", $arredit );
            	if($userResult==true){
            		echo '1';
            	}
        	}
        } catch (Exception $e) {
			$this->handleException($e->getMessage());
			}
	}
    
    function testmanagement() {
        try{
        	$this->loadView ( "header" );
        	$this->loadView ( "user_header" );
        	$this->loadView ( "admin_view/admin_deshboard_menu" );
        	$arrArgs = $this->loadModel ( "admin", "fetchTests" );
        	$this->loadView ( "admin_view/testmanagement", $arrArgs );
    	}catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function feedbackmanagement() {
        try{
        	$this->loadView ( "header" );
        	$this->loadView ( "user_header" );
        	$this->loadView ( "admin_view/admin_deshboard_menu" );
        	$result = $this->loadModel ( "admin", "feedbackManagementModel" );
        	$this->loadView ( "admin_view/feedbackmanagement", $result );
        }catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function adminMailSend() {
        try{
        	$id = strip_tags($_POST ['id']);
        	$body = strip_tags($_POST ['body']);
        	$result = $this->loadModel ( "admin", "fetchFeedEmail", $id );
        	if ($result) {
            	mailTest ( $result, 'info.test.scheduler@gmail.com', $body );
        	} else {
            	return 0;
        		}
		}catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function deleteTest() {
        try{
        	$result = $this->loadModel ( "admin", "deleteTest", array ("id" => strip_tags($_POST ['id']) ) );
        	if ($result) {
            	$_SESSION['SESS_ERROR']="Test Successfully Deleted";
        	}
        }catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
    
    function fetchTestContents() {
        try{
        	$arrArgs = $this->loadModel ( "admin", "fetchTestContent", array ("id" => strip_tags($_GET ['id'])) );
        	$this->loadView ( "admin_view/testContent", $arrArgs );
        }catch (Exception $e) {
			$this->handleException($e->getMessage());
        	}
    }
}
// set error handler

?>
