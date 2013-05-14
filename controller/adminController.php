<?php
include SITE_ROOT . 'controller/mainController.php';
class adminController extends mainController {
    function sendmail() {
        if ($_POST ['contactus']) {
            $sub = $_POST ['contact_name'] . " <-name   email-> " . $_POST ['contact_email'];
            $to = "info.test.scheduler@gmail.com";
            $body = $_POST ['contact_suggestion'];
            $name = $_POST ['contact_name'];
            $email = $_POST ['contact_email'];
            mailTest ( $to, $sub, $body );
            $arrArgument = array (
                    'name' => $name,
                    'email' => $email,
                    'body' => $body 
            );
            $this->loadModel ( "admin", "contactUs", $arrArgument );
        }
    }
    function home() {
        $this->usermanagement();
    }
    function usermanagement() {
        $this->loadView ( "header" );
        $this->loadView ( "user_header" );
        $this->loadView ( "admin_view/admin_deshboard_menu" );
        $userResult = $this->loadModel ( "admin", "usermanagement" );
        $this->loadView ( "admin_view/usermanagement", $userResult );
    }
    function showUserDetails() {
        if (isset ( $_POST ['id'] ) && isset ( $_POST ['request'] )) {
            if ($_POST ['request'] == 'EDIT') {
                $userResult = $this->loadModel ( "admin", "showUserDetails", $_POST ['id'] );
                $this->loadView ( "admin_view/showUserDetails", $userResult );
            } else if ($_POST ['request'] == 'DELETE') {
                $userResult = $this->loadModel ( "admin", "deleteUser", $_POST ['id'] );
            }
        }
    }
     function editUserDetails() {
        if (isset ( $_POST )) {
        	$arredit=array();
	    	$arredit['username']= strip_tags($_POST['username']);
	    	$arredit['password']= strip_tags($_POST['password']);
	    	$arredit['first_name']= strip_tags($_POST['first_name']);
	    	$arredit['last_name']= strip_tags($_POST['last_name']);
	    	$arredit['email']= strip_tags($_POST['email']);
	    	$arredit['org_type']=$_POST['org_type'];
	    	$arredit['user_type']=$_POST['user_type'];
	    	$arredit['id']=$_POST['id'];
            $userResult = $this->loadModel ( "admin", "editUserDetails", $arredit );
        }
    }
    function testmanagement() {
        $this->loadView ( "header" );
        $this->loadView ( "user_header" );
        $this->loadView ( "admin_view/admin_deshboard_menu" );
        $arrArgs = $this->loadModel ( "admin", "fetchTests" );
        $this->loadView ( "admin_view/testmanagement", $arrArgs );
    }
    function feedbackmanagement() {
        $this->loadView ( "header" );
        $this->loadView ( "user_header" );
        $this->loadView ( "admin_view/admin_deshboard_menu" );
        $result = $this->loadModel ( "admin", "feedbackManagementModel" );
        $this->loadView ( "admin_view/feedbackmanagement", $result );
    }
    function adminMailSend() {
        $id = $_POST ['id'];
        $body = $_POST ['body'];
        $result = $this->loadModel ( "admin", "fetchFeedEmail", $id );
        if ($result) {
            mailTest ( $result, 'info.test.scheduler@gmail.com', $body );
        } else {
            return 0;
        }
    }
    function deleteTest() {
        $result = $this->loadModel ( "admin", "deleteTest", array (
                "id" => $_REQUEST ['id'] 
        ) );
        if ($result) {
            echo "DELETED";
        }
    }
    function fetchTestContents() {
        $arrArgs = $this->loadModel ( "admin", "fetchTestContent", array (
                "id" => $_REQUEST ['id'] 
        ) );
        $this->loadView ( "admin_view/testContent", $arrArgs );
    }
}
// set error handler

?>
