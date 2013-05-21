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
function fncIssueCertificate(testId) {
	if(confirm('Are You Sure')) {
		$.ajax({
				type:"POST",
				url:'<?php echo SITE_PATH.'certificate/issueCertificate'; ?>',
				data:"test_id="+testId,
				success:function(result) {
					alert(result);
					//location.reload();
				}
		});//ajax function ends here
	}
}
</script>
 
<div class="contact-strip bg-mid-gray" style="text-align:center">
	<?php echo ISSUE_CERTIFICATE; ?>
 </div>
<div class="bigmid" align="center">
	<div class="midpanel" style="width: auto;">

		<!-- midpanel Content gooes here  -->

		<div class="middle_content" >
		
			<div class="space"></div>
			<table class="table-generic table" id="shubh">
				<thead>
					<tr>
						<th><?php echo SERIAL_No; ?></th>
						<th><?php echo TEST; ?></th>
						<th colspan="4"><?php echo OPTION; ?></th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 0;
					$count = 0;
					echo '<pre>';
					if (isset ( $arrData ['testName'] )) {
						while ( (! empty ( $arrData ['testName'] [$i] )) ) {
							echo '<tr>';
								echo '<td>' . ++ $count . '</td>';
								echo '<td>';
									print_r ( $arrData ['testName'] [$i] );
								echo '</td>';
								echo "<td><a href='#' onclick=fncIssueCertificate(".$arrData ['testId'] [$i].")>".
										ISSUE_CERT."</a></td>";
								$i ++;
							echo '</tr>';
						}
					}
					?>
				</tbody>
			</table>

		</div>

	</div>
	
</div>

