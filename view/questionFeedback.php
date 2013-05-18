<body>
	<?php 
		if(isset($arrData) && !empty($arrData)){
			$i=1;
	?>
			<table class="table-generic table1">
			<thead>
				<tr style="background-color:#666666; color:#FFFFFF" valign="top">
					<th style="font-size:13px" align="left"><?php echo S_NO;?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo "Question ID"; ?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo "Test Taker Id"; ?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo "Test Taker Name"; ?>
					</th>
					<th style="font-size:13px" align="left"> <?php echo "View Feedback"; ?>
					</th>
					   
				</tr>
			</thead>
  				<tbody>
                <?php 
                
					foreach($arrData as $viewFeedback)
					{ 
				?>
						<tr>
							<td><?php echo $i;?>
							<td><?php echo $viewFeedback['ques_id'];?></td>
							<td><?php echo $viewFeedback['test_taker_id'];?></td>
							<td><?php echo $viewFeedback['first_name']." ".$viewFeedback['last_name'];?></td>
							<td><?php echo $viewFeedback['feedback'];?></td>
						</tr>
				<?php 
					$i++;
					} // end of foreach
				?>
				</tbody>
			</table>
	<?php	
		} else { // end of if start of else
				echo "<strong>No Data Found</strong>";
			} // end of else
	?> 
	</div>
</body>
