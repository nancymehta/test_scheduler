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
<script>

function createCertificate()
{	
	$.ajax({ 
      type: "POST",
      url : '<?php echo SITE_PATH.'/createTest/certificateCreate'; ?>',                                             
      data: $('#certificateEdit').serialize(),
       beforeSend: function() {

        },
       success: function(data){
           alert(data);
        },
       complete: function () {
            
        },
      error: function(){
            
        }
  
   });
 }  
</script>


<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->





<div id="certificate">
	<form id="certificateEdit"  name="certificateEdit" action="<?php echo SITE_PATH.'/createTest/certificateCreate'; ?>" method="post">
		<input type="hidden" value="" name="certificate_id">
		<h3>Certificate name</h3>
		<div>
			<p>
			<input type="text" value=""  id="certificate_name" name="certificate_name">
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
							<label>Description of certificate to:</label><textarea id="certificate_body" name="certificate_body" cols="40" rows="2" original-title="Describe what the certificate has been awarded for. Example: For completing Level 2 of the Training Course."></textarea>
							<br>
							<span>Limit 100 characters.</span>
						</td>
					</tr>
					
					
				</tbody>
			</table>
		</div>
		<input type="button" value="Save certificate" class="submmit_button_generic" onclick="validateCertificate()" />
	</form>
</div>
<form id="certificateEdit"  name="certificateEdit" action="<?php echo SITE_PATH.'createTest/showCertificate'; ?>" method="post">
	<input type="submit" value="preview certificate" class="submmit_button_generic" />
</form>
</div>
<div class="midright">

<!-- right content goes here -->
</div> 

</div>
