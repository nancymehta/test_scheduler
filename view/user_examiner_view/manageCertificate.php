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
	<form id="certificateEdit"  name="certificateEdit" action="<?php echo SITE_PATH.'/createTest/createCertificate'; ?>" method="post">
		<input type="hidden" value="" name="certificate_id">
		<h3>Certificate name</h3>
		<div>
			<p>
			<input type="text" value="" size="30" maxlength="30" id="cert_name" name="cert_name">
			<span >Limit 30 characters.</span>
			</p>
		</div>
		<h3>Customize Certificate</h3>
		<div id="certificate_live_edit">
			<table class="table-generic table1">
				<tbody>
					
					<tr>
						<td width="480" align="center">
						<h2>Certificate of Achievement</h2>
						</td>
					</tr>
					<tr>
						<td width="480" align="center">
					<label>Presented to:</label>		<span id="cert_user_name" style="color:black;font-size:1.23em">John Smith</span>
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Description of certificate to:</label><textarea id="cert_received_for" name="cert_received_for" cols="40" rows="2" original-title="Describe what the certificate has been awarded for. Example: For completing Level 2 of the Training Course."></textarea>
							<br>
							<span>Limit 100 characters.</span>
						</td>
					</tr>
					<tr>
						<td width="480" align="center">
							<h5 id="cert_quiz">
							<label>Test Name</label>
								Your test name will appear here
							
									<label>score</label>
									<span id="score_title"><label>88/100</label></span>
														
							</h5>
						</td>
					</tr>
					
				</tbody>
			</table>
		</div>
		<input type="submit" value="Save and preview certificate" class="submmit_button_generic" />
		<input type="submit" value="Cancel" class="submmit_button_generic" />
	</form>
</div>


</div>


</div>
