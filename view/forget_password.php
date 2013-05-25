<div class = "mainContainer">
	<div class="bigmid" >
<form action="<?php echo SITE_PATH.'main/check_forget_email';?>" id="forgot-password" method="post">
Enter Email Address<input type="text" name="email" id="email" class="max-length"><?php if(isset($arrData) && empty($arrData)){
		?> No User Exist! <?php } ?><div class="space"></div>
<input type="submit" class="button_generic floatl" value="Request Password" name="req_password" id="req_password">
</form>
</div>
</div>