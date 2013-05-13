<?php
/**
 * This Page is used to Change the Password.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */ 

?>
<form action="<?php echo SITE_PATH .'accountSettings/processChangePassword'?>" method="post" onsubmit="return confirmChangePassword()">
<table>
    <tr>
        <td>
            Old Password :
        </td>
        <td>
            <input type="password" name="oldPass" id="oldPass" value="">
        </td>
    </tr>
    
    <tr>
        <td>
            New Password :
        </td>
        <td>
            <input type="password" name="newPass" id="newPass">
        </td>
    </tr>
    
    <tr>
        <td>
            Confirm Password :
        </td>
        <td>
            <input type="password" name="cNewPass" id="cNewPass">
        </td>
    </tr>
    <tr>
        <td>
           <input type='submit' value="Submit">
         
        </td>
    </tr>
</table>

</form>

<a href="<?php echo SITE_PATH .'accountSettings/accountSettings'?>">Back</a>

<script>
    
    //This function is used for the validation of Passwords
    function confirmChangePassword() {
        var passReg     =   /^[A-Za-z]\w{7,14}$/;
        var newPass      =   document.getElementById('newPass').value;
        var cNewPass     =   document.getElementById('cNewPass').value;
        
       /* if(oldPass.match(passReg))  
        {  
        }  
        else  
        {  
        alert('Please enter valid old Password');  
        return false;  
        }*/
        
        if(newPass.match(passReg))  
        {  
        }  
        else  
        {  
        alert('Please enter valid new Password');  
        return false;  
        }
       
       if(cNewPass.match(passReg))  
        {  
        }  
        else  
        {  
        alert('Please enter valid confirm Password');  
        return false;  
        }
       
       if (newPass==cNewPass) {
       }else{
        alert("New password and Confirm Password does not match");
        return false;
       }
        
        var ans =   confirm("Are you sure to change password ?");
        if (ans) {
            return true;
        }
        else
        {
            return false;
        }
    }
</script>