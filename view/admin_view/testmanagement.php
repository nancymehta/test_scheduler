<div class="bigmid" >
<div class="midpanel" style="border:1px solid red">

<!-- midpanel Content gooes here  -->



<script type="text/javascript" >
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
						alert("The Test Has Been Successfully Deleted");
						window.location.href="<?php echo SITE_PATH;?>admin/testmanagement";
					}
                },
				error: function () {
					alert("Error Occurred While Processing Your Request.");
				},
			});
		} else {
			alert("Invalid Command");
		}
		
	}
</script>
<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)) {
		
?>
		<table width="89%" border="1" cellpadding="0" cellspacing="0"  class="table-generic">
			<thead>
				<tr style="background-color:#666666; color:#FFFFFF" valign="top">
					<th style="font-size:13px" align="left"><?php echo "S. No.";?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "Test Name"; ?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "Created On"; ?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "Options"; ?>
					</th>   
				<tr>
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
						<td><a href="#" onClick="fetchTestContent(<?php echo $key['id']; ?>)">View</a>  <a href="#" onClick="deleteTest(<?php echo $key['id']; ?>)">DELETE</a>
						</td>
						
					</tr>
				<?php 
				} // end of foreach
				?>
			</tbody>
		</table>
		

		<pre>
			
			
			
		
	</div>


</div>
<div class="midright">
<div style="display: none;" id="hidden"></div>
		</pre>
	<?php	
		} else { // end of if start of else
				echo "<strong>"."NO RECORDS FOUND"."</strong>";
		  } // end of else
	?> 
<!-- right content goes here -->

</div>

</div>