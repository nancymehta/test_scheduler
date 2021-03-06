<script type="text/javascript">
	function fetchTestContent(id) {
		$("#hidden").toggle();
		$("#hidden").load("<?php echo SITE_PATH;?>admin/fetchTestContents","id="+id);
	}
	function deleteTest(id) {
		if(id) {
			$.ajax( {
				type: "POST",
				url: "<?php echo SITE_PATH;?>admin/deleteTest",
				data: "id="+id,
			    success: function(response){
					if(response=='DELETED'){
						alert("<?php echo SUCCESSFULLY_DELETED; ?>");
						window.location.reload();
					}
                },
				error: function () {
					alert("<?php echo ERROR_WHILE_PROCESSING; ?>");
				},
			});
		} else {
			alert("<?php echo INVALID_COMMAND; ?>");
		}
		
	}
	

</script>

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
					</th>
					<th style="font-size:13px" align="left" colspan="2"> <?php echo OPTIONS; ?>
					</th>   
					<th>Print Result</th>
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
					
						<td><a style="background-color:white;margin-top: 5px;" href="#" onClick="fetchTestContent(<?php echo $key['id']; ?>)"><img style="height:24px;width:24px;" src="<?php echo IMAGE_PATH;?>/editb.jpg"></img></a></td>
						<td><a href="#" style="background-color:white;margin-top: 5px;" onClick="deleteTest(<?php echo $key['id']; ?>)"><img src="<?php echo IMAGE_PATH;?>/delete.gif"></img></a>
						</td>
						<td>
						<a href="#" onClick="deleteTest(<?php echo $key['id']; ?>)"><?php echo 'generate PDF'; ?></a>
						</td>
						
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
