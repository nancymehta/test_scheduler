<?php
/**
 * This Page is used to show the options to the users.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */ 

?>
<table>
    <tr>
        <td>
            <a href="#" onclick="viewDetails()">View Details</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" onclick="editDetails()">Edit Details</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" onclick="changePassword()">Change Password</a>
        </td>
    </tr>
    <tr>
        <td>
            <a href="#" onclick="deactivateAccount()">Deactivate Account</a>
        </td>
    </tr>
</table>

<script type="application/x-javascript">
    
    function viewDetails() {
        window.location.assign("<?php echo SITE_PATH;?>accountSettings/viewDetails");
    }
    
    function editDetails() {
        window.location.assign("<?php echo SITE_PATH;?>accountSettings/editDetails");
    }
    
    function changePassword() {
        window.location.assign("<?php echo SITE_PATH;?>accountSettings/changePassword");
    }
    
    function deactivateAccount() {
        var ans     =   confirm("Are you sure you want to deacticate your account ?")
        
        if (ans) {
            window.location.assign("<?php echo SITE_PATH;?>accountSettings/deactivateAccount");
        }
    }
</script>
