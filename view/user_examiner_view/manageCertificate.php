<?php
/* @author 		 :Ashwani Singh	
*  @created on   :09-05-2013
*  @desc		 :View for creating certificate.
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
      url : '<?php echo SITE_PATH.'certificate/certificateCreate'; ?>',                                             
      data: $('#certificateEdit').serialize(),
       beforeSend: function() {

        },
       success: function(data){
           alert(data);
           $('#certificateEdit').get(0).reset();
        },
       complete: function () {
            
        },
      error: function(){
            
        }
	 });
	
 }  
</script>

<div class="contact-strip bg-mid-gray" style="text-align: center;">
	<?php echo CREATE_CERTIFICATE; ?> 
</div>
<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->





<div id="certificate">
	<form id="certificateEdit"  name="certificateEdit" action="<?php echo SITE_PATH.'certificate/certificateCreate'; ?>" method="post">
		<input type="hidden" value="" name="certificate_id">
		<h3><?php echo SELECT_TEST; ?></h3>
		<div>
			<p>
			<div class="search_test" name="search_test" id="search_test">
				<select name="test_select" id="test_select">
					<option value="0"><h3><?php echo SELECT_TEST; ?></h3></option>
					<?php foreach($arrData as $key) {
					echo "<option value=".$key['id'].">".$key['name']."</option>";
					}?>
		
				</select>
			</div>	
			</p>
		</div>	
		
		<h3><?php echo ENT_CERTIFICATE_NAME; ?></h3>
		<div>
			<p>
			<input type="text" value=""  id="certificate_name" name="certificate_name">
			<span ><?php echo LIMT_30_CHAR; ?></span>
			</p>
		</div>
		<h3><?php echo CUST_CERTIFICATE; ?></h3>
		<div id="certificate_live_edit">
			<table class="table-generic table1">
				<tbody>
					
					<tr>
						<td width="480" align="center">
						<h2><?php echo CERT_ACHIEVEMENT;?></h2>
						</td>
					</tr>
					<tr>
						<td width="480" align="center">
					<label><?php echo PRESENTED_TO; ?></label>		<span id="cert_user_name" style="color:black;font-size:1.23em"><?php echo DEMO_NAME;?></span>
						</td>
					</tr>
					<tr>
						<td width="480">
							<label><?php DESC_CERT; ?></label><textarea id="certificate_body" name="certificate_body" cols="40" rows="2" ></textarea>
							<br>
							<span><?php echo LIMT_100_CHAR; ?></span>
						</td>
					</tr>
					
					
				</tbody>
			</table>
		</div>
		<input type="button" value="<?php echo SAVE_CERT; ?>" class="submmit_button_generic" onclick="validateCertificate()" />
	</form>

</div>

</div>
