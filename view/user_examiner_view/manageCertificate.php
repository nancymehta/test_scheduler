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



<style type="text/css">
#certificate_live_edit , #certificate {
	border: solid ;
}
h3 {
    
    font-size: 1.7em;
    font-weight: bold;
    margin: 0 0 0 -20px;
    padding: 0 0 41px 20px;
}
h2, h3, h6 {
    font-family: Helvetica,sans-serif,Arial;
}
table,tr,td,th,tbody,thead {
	background-color: white;
	float:left;
	text-align: left;
	
}
</style>

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
			<table width="600" border="0" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td  height="70" colspan="3" style="height: 70px;"> </td>
					</tr>
					<tr>
						<td width="60"> </td>
						<td width="480" align="center">
							<input id="cert_main_title" type="text" value="Certificate of Achievement" maxlength="100" name="cert_main_title" original-title="You can edit the certificate title. Maximum 100 characters. Example: Certificate of Achievement" style="color: rgb(0, 0, 0);">
						</td>
						<td width="60"> </td>
					</tr>
					<tr>
						<td  height="50" colspan="3" style="height: 50px;"> </td>
					</tr>
					<tr>
						<td width="60"> </td>
						<td width="480" align="center">
							<input id="cert_presented_to" type="text" value="Presented to:" size="10" name="cert_presented_to" maxlength="20" original-title="You can edit this field. Note: Test takers names are added automatically. Maximum 20 characters. Example: Presented to:" style="visibility: visible;">
							<span id="cert_user_name" style="visibility: visible;">John Smith</span>
						</td>
						<td width="60"> </td>
					</tr>
					<tr>
						<td height="20" colspan="3"> </td>
					</tr>
					<tr>
						<td width="60"> </td>
						<td width="480">
							<textarea id="cert_received_for" name="cert_received_for" cols="40" rows="2" original-title="Describe what the certificate has been awarded for. Example: For completing Level 2 of the Training Course."></textarea>
							<br>
							<span>Limit 100 characters.</span>
						</td>
						<td width="60"> </td>
					</tr>
					<tr>
						<td height="80" colspan="3"> </td>
					</tr>
					<tr>
						<td width="60"> </td>
						<td width="480" align="center">
							<h5 id="cert_quiz">
								<span id="cert_testname" style="visibility: visible;">
								<input id="cert_quiz_name" type="text" value="Test name:" size="10" name="cert_quiz_name" maxlength="20" original-title="You can edit this field. Note: The actual test name will be added to certificates automatically. Maximum 20 characters. Example: Test name:">
								Your test name will appear here
								<br>
								</span>
								<span id="cert_testscore" style="visibility: visible;">
									<input id="scored_text" type="text" value="Score:" size="5" name="scored_text" maxlength="20" original-title="You can edit this field. Maximum 20 characters. Example: Scored">
									<span id="score_title">88</span>
									<input id="out_of_text" type="text" value="out of" size="5" name="out_of_text" maxlength="20" original-title="You can edit this field. Maximum 20 characters. Example: out of">
										100
								</span>
							</h5>
						</td>
						<td width="60"> </td>
					</tr>
					<tr>
						<td height="30" colspan="3"> </td>
					</tr>

				</tbody>
			</table>
		</div>
		<input type="submit" value="Save and preview certificate"/>
		<input type="submit" value="Cancel" />
	</form>
</div>


</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>
