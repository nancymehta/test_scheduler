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
			<input type="text" value="" size="30" maxlength="30" id="certificate_name" name="certificate_name">
			<span >Limit 30 characters.</span>
		<h3>Customize Certificate</h3>
		<input id="certificate_title" type="text" value="Certificate of Achievement" maxlength="100" name="certificate_title" original-title="You can edit the certificate title. Maximum 100 characters. Example: Certificate of Achievement">
	<br><input id="certificate_body" type="text" value="Enter body content of certificate" maxlength="100" name="certificate_body" />
	<br><input type="submit" value="Save certificate"/>
	<br><input type="submit" value="Cancel" />
	</form>
	
	<form id="certificateEdit"  name="certificateEdit" action="http://test_scheduler.com/createTest/showCertificate" method="post">
		<input type="submit" value="preview certificate"/>
	</form>
	
</div>


</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>
