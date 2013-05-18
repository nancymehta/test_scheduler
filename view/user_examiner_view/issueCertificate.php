  <div class="contact-strip bg-mid-gray">
 Home </div>
<div class="bigmid">

	<div class="midpanel" style="width: auto;">

		<!-- midpanel Content gooes here  -->


		<div class="middle_content">
			<script>
	function fncIssueCertificate(testId){
		if(confirm('Are You Sure')) {
			$.ajax({
				type:"POST",
				url:"http://test_scheduler.com/certificate/issueCertificate",
				data:"id="+testId,
				success:function(result){
					alert(result);
					location.reload();
					}
			});//ajax function ends here
		}
	}
</script>
			
		
		
			<div class="space"></div>
			<table class="table-generic table1" id="shubh">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Test</th>
						<th colspan="4">Option</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$i = 0;
			$count = 0;
			echo '<pre>';
			if (isset ( $arrData ['test'] ['testName'] )) {
				while ( (! empty ( $arrData ['test'] ['testName'] [$i] )) ) {
					echo '<tr>';
					echo '<td>' . ++ $count . '</td>';
					echo '<td>';
					print_r ( $arrData ['test'] ['testName'] [$i] );
					echo '</td>';
					echo "<td><a href='#' onclick=fncIssueCertificate(".$arrData ['test'] ['testId'] [$i].")>Issue Certificate</a></td>";
					$temp=$arrData ['test'] ['testId'][$i].$arrData ['test'] ['testName'][$i];
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

