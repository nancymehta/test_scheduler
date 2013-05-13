<?php
/**
 * This Page is used to show the details to the user.

 * @package              Zend_Magic

 * @author               ABHISHEK ARORA
 * @date                 13-05-2013
 * @version              version - 1
 * ...
 */ 

?>
<form action="<?php echo SITE_PATH .'accountSettings/editDetails'?>" method="post" id="myForm">
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
    <tr>
        <td>
           <a href="#" onclick="editDetails()">Edit Details</a>
         
        </td>
    </tr>
</table>
</form>
<a href="<?php echo SITE_PATH .'accountSettings/accountSettings'?>">Back</a>
<script type="application/x-javascript">

//This function is used to redirect the page to accountSettings controller to get the values for editing
function editDetails() {
window.location.assign("<?php echo SITE_PATH;?>accountSettings/editDetails&fname");
}
</script>
