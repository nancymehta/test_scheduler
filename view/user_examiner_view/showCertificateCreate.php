<?php
/* @author 		 :Ashwani Singh	
*  @created on   :09-05-2013
*  @desc		 :Controller to create a test.
*********************************************Modifed Log ********************************
*Name				Task						Date			Description
*
*
********************************************************************************************
*
*/

?>

<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div id="certificate">
	<form id="certificateEdit"  name="certificateEdit" action="http://test_scheduler.com/createTest/certificateCreate" method="post">
		<h3>Certificate name</h3>
		<br>
			<input type="text" value="" size="30" maxlength="30" id="certificate_name" name="certificate_name">
			<span >Limit 30 characters.</span><br><br>
		
		<h3>Customize Certificate</h3>
<br><br>
		<input id="certificate_title" type="text" value="Certificate of Achievement" maxlength="100" name="certificate_title" original-title="You can edit the certificate title. Maximum 100 characters. Example: Certificate of Achievement">
	<br><input id="certificate_body" type="text" value="Enter body content of certificate" maxlength="100" name="certificate_body" />
	<br><br><br><input type="submit" value="Save certificate" class="submmit_button_generic"/>
	<br><input type="submit" value="Cancel" class="submmit_button_generic" />
	</form>
	<form id="certificateEdit"  name="certificateEdit" action="http://test_scheduler.com/createTest/showCertificate" method="post">
		<input type="submit" value="preview certificate" class="submmit_button_generic"/>
	</form>
	
</div>

</div>
<div class="midright">

<!-- right content goes here -->
</div> 

</div>
