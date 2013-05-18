<script type="text/javascript">
function fetchFeedback(id) {
		$.ajax( {
			type: "POST",
			url: "<?php echo SITE_PATH;?>user/questionFeedback",
			data: "id=" +id,
		    success: function(response){
			$(".um").html(response);
            },
			error: function () {
			},
		});
}
</script>
  <div class="contact-strip bg-mid-gray">
 Available Test </div>
<div class="bigmid" >
<div class="midpanel">

<!-- midpanel Content gooes here  -->
<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)) {
		
?>
		<table class="table-generic table1">
			<thead>
				<tr style="background-color:#666666; color:#FFFFFF" valign="top">
					<th style="font-size:13px" align="left"><?php echo S_NO;?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo TEST_NAME; ?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo CREATED_ON; ?>
				</tr>
			</thead>
  			<tbody>
               	<?php
					$count=0;
					foreach($arrData as $key){
					$count++;
				?>
					<tr valign="top">
                        <td><?php echo $count; ?></td>
						<td><?php echo $key['name']; ?></td>
						<td><?php echo $key['created_on']; ?></td>
					
						<td><a href="#" onClick="fetchFeedback(<?php echo $key['id']; ?>);"><?php echo "View Feedback" ?></a></td>
						
					</tr>
				<?php 
				} // end of foreach
				?>
			</tbody>
		</table>
					
		
	</div>


</div>
<div class="midright">
<div style="display: none;" id="hidden"></div>
		
	<?php	
		} else { // end of if start of else
				echo "<strong>".NO_RECORDS_FOUND."</strong>";
		  } // end of else
	?> 
<!-- right content goes here -->

</div>

</div>