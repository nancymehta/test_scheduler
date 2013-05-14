<?php 
/**
 * This Form is used to show the values t0 the users for editing.
*/
?>
 <script>
$(function() {
$( "#accordion" ).accordion();
});
</script>
<div class="space"></div><div class="space"></div>
<div class="space"></div><div class="space"></div>
<div id="accordion" >
<h3>View Details</h3>
<div >
<form>
<table class="font-small">
    <?php
    if(isset($arrData))
    {
    ?>
    
    <tr>
        <td>
            First Name :
        </td>
        <td>
            <input type="text" name="fname" value="<?php echo $arrData['firstname'];?>" disabled>
        </td>
    </tr>
    
    <tr>
        <td>
            Last Name :
        </td>
        <td>
            <input type="text" name="lname" value="<?php echo $arrData['lastname']; ?>" disabled>
        </td>
    </tr>
    
    <tr>
        <td>
            Email :
        </td>
        <td>
            <input type="text" name="email" value="<?php echo $arrData['email']; ?>" disabled>
        </td>
    </tr>
    
    <tr>
        <td>
            Username :
        </td>
        <td>
            <input type="text" name="uname" value="<?php echo $arrData['username']; ?>" disabled>
        </td>
    </tr>
    <?php } ?>
   </table>
</form>

</div>

<h3>Edit Details</h3>
<div class="font-small">
<form action="<?php echo SITE_PATH .'accountSettings/processDetails'?>" method="post" onsubmit=" return confirmSubmitDetais()">
<table class="font-small">
    <?php
    if(isset($arrData))
    {
    ?>
    
    <tr>
        <td>
            First Name :
        </td>
        <td>
            <input type="text" name="fname" id="fname" value="<?php echo $arrData['firstname'];?>">
        </td>
    </tr>
    
    <tr>
        <td>
            Last Name :
        </td>
        <td>
            <input type="text" name="lname" id="lname" value="<?php echo $arrData['lastname']; ?>">
        </td>
    </tr>
    
    <tr>
        <td>
            Email :
        </td>
        <td>
            <input type="text" name="email" id="email" value="<?php echo $arrData['email']; ?>">
        </td>
    </tr>
    
    <?php } ?>
    </table>
    <div class="space"></div><div class="space"></div><div class="space"></div><div class="space"></div>
           <input value="Save" class="submmit_button_generic" type='submit' value="Submit">
         
       

</form>


</div>

<h3>Change Password</h3>
<div>
<form action="<?php echo SITE_PATH .'accountSettings/processChangePassword'?>" method="post" onsubmit="return confirmChangePassword()">
<table class="font-small">
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
   </table>
   <div class="space"></div><div class="space"></div>
           <input class="submmit_button_generic" type='submit' value="Submit">
         
     


</form>
</div>
<!--  -->
<h3> Account Deactivate</h3>
<div>

        
           <a  href="#" onclick="deactivateAccount()"> <span class="fg-dark-blue font-mid floatl">Deactivate Account</span></a>
       
</div>
</div>
<script>
    
    //This function is used for the validation of Passwords
    function confirmChangePassword() {
        var passReg     =   /^[A-Za-z]\w{7,14}$/;
        var newPass      =   document.getElementById('newPass').value;
        var cNewPass     =   document.getElementById('cNewPass').value;
        
       if(oldPass.match(passReg))  
        {  
        }  
        else  
        {  
        alert('Invalid old Password');  
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

    //This function is used to redirect the page to accountSettings controller to get the values for editing
    function editDetails() {
    window.location.assign("<?php echo SITE_PATH;?>accountSettings/editDetails&fname");
    }

    //This function is used to validate the details of user before updating
    function confirmSubmitDetais() {
        var fname   =   document.getElementById('fname').value;
        var lname   =   document.getElementById('lname').value;
        var email   =   document.getElementById('email').value;
        
         var letters    = /^[A-Za-z]+$/;
         var emailReg   =   /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(fname.match(letters))  
        {  
        }  
        else  
        {  
        alert('First name can take only alphabets');  
        return false;  
        }
       
       if(lname.match(letters))  
        {  
        }  
        else  
        {  
        alert('Last name can take only alphabets');  
        return false;  
        }
        
        if(email.match(emailReg))  
        {  
        }  
        else  
        {  
        alert('Please enter valid email');  
        return false;  
        }
        
        var ans =   confirm("Are you confirm to submit these details");
        if (ans) {
            return true;
        }else{
            return false;
        }
    }

    function deactivateAccount() {
        var ans     =   confirm("Are you sure you want to deacticate your account ?")
        
        if (ans) {
            window.location.assign("<?php echo SITE_PATH;?>accountSettings/deactivateAccount");
        }
    }
    
        
</script>
