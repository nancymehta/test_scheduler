<?php
/**
 * This page is used to show the values tp the users for editing.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */ 

?>

<form action="<?php echo SITE_PATH .'accountSettings/processDetails'?>" method="post" onsubmit=" return confirmSubmitDetais()">
<table>
    <?php
    if(isset($arrData))
    {
    ?>
    
    <tr>
        <td>
            First Name :
        </td>
        <td>
            <input type="text" name="fname" id="fname" value="<?php echo $arrData['fname'];?>">
        </td>
    </tr>
    
    <tr>
        <td>
            Last Name :
        </td>
        <td>
            <input type="text" name="lname" id="lname" value="<?php echo $arrData['lname']; ?>">
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
    <tr>
        <td>
           <input type='submit' value="Submit">
         
        </td>
    </tr>
</table>
</form>
<a href="<?php echo SITE_PATH .'accountSettings/accountSettings'?>">Back</a>
<script>
    
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
</script>
