
<?php
	//echo "<pre>";
	//print_r( $arrData);
	if(isset($arrData) && !empty($arrData)) {
		$count=0;
		?>
		<table class="table1 table-generic" width="89%" border="1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr style="background-color:#222222; color:#FFFFFF" valign="	">
					<th style="font-size:13px" align="left"><?php echo S_NO;?>
					</th>
					<th style="font-size:13px" align="left"><?php echo QUESTION; ?>
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
						<td><?php echo $key['question']; ?></td>
					</tr>
				<?php 
				} // end of foreach
				?>
			</tbody>
		</table>
		
	<?php } else {
		echo NO_QUESTIONS_FOUND;
	}
	
?>
