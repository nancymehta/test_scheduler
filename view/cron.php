<?php
/* @author 		 :Ashwani Singh	
*  @created on   :09-05-2013
*  @desc		 :view to add cronjob
*********************************************Modifed Log ********************************
*Name				Task						Date			Description
*
*
********************************************************************************************
*
*/

?>
<script>
// fucntion to create cron job	
function createCron()
{	 
	$.ajax({ 
      type: "POST",
      url : '<?php echo SITE_PATH.'cron/createCronjob'; ?>',                                             
      data: $('#cronjobs').serialize(),
       beforeSend: function() {

        },
       success: function(data){
           alert(data);
           // $('#cronjobs').get(0).reset();
        },
       complete: function () {
            
        },
      error: function(){
            
        }
	 });
	
 }
 
 // function to show cron job
 function showCron()
{	 
	$.ajax({ 
      type: "POST",
      url : '<?php echo SITE_PATH.'cron/showCronjob'; ?>',                                             
      data: $('#runingCron').serialize(),
       beforeSend: function() {

        },
       success: function(data){
           
           $('.midright').append(data);
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
	<form id="cronjobs"  name="cronjobs" action="<?php echo SITE_PATH.'cron/createCronjob'; ?>" method="post">
		<input type="hidden" value="" name="certificate_id">
		
		<div>
			
		</div>
		<h3>Customize Cronjob</h3>
		<div id="certificate_live_edit">
			<table class="table-generic table1">
				<tbody>
					
					<tr>
						<td width="480">
							<label>Enter Cronjob Name: </label><input type="text" value=""  id="cron_name" class="max-length" name="cron_name">
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter full path of the script:</label><textarea id="cron_Script_path" name="cron_Script_path" cols="40" rows="2" original-title="Describe what the certificate has been awarded for. Example: For completing Level 2 of the Training Course." class="max-length"></textarea>
							<br>
							<span>Limit 100 characters.</span>
						</td>
					</tr>
					<tr>
						<td width="480" align="center">
						<h2>Select Time</h2>
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter minutes(0-59) or enter * : </label>
							<input type="text" class="max-length" value=""  id="cron_min" name="cron_min">
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter hours(0-23) or enter * : </label>
							<input type="text" class="max-length" value=""  id="cron_hours" name="cron_hours">
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter days (1-31) or enter * : </label>
							<input type="text" class="max-length" value=""  id="cron_days" name="cron_days">
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter month (1-31) or enter * : </label>
							<input type="text" value="" class="max-length"  id="cron_months" name="cron_months">
						</td>
					</tr>
					<tr>
						<td width="480">
							<label>Enter day (0-7)where both 0 and 7 mean Sun, 1 = Mon or enter * : </label>
							<input type="text" class="max-length" value=""  id="cron_day" name="cron_day">
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<input type="button" value="Create Cron" class="submmit_button_generic" onclick="createCron()" />
	</form>
</div>
<form id="runningCron"  name="runningCron" action="<?php echo SITE_PATH.'cron/showCronjob'; ?>" method="post">
	<input type="button" value="See Running Cronjobs" class="submmit_button_generic" onclick="showCron()" />
</form>
</div>
<div class="midright">

<!-- right content goes here -->
</div> 

</div>
