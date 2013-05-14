<div class="overall" style="text-align: center">

<?php
if (isset ( $arrData )) {
	$data_sum = 0;
	$data_perc = 0;
	$diff_time = 0;
	$diff = 0;
	foreach ( $arrData as $key ) {
		$end_time = strtotime ( $key ['end_time'] );
		$start_time = strtotime ( $key ['start_time'] );
		$diff += $end_time - $start_time;
		$data_sum += $key ['score'];
		$total_ques = $key ['total_ques'];
	}
	
	$total_perc = ( float ) ($data_sum / $total_ques) * 100;
	$total_attempt = count ( $arrData );
	$totalDuration = $diff / $total_attempt;
	
	?>
</div>
<table>
	<tr>
		<th>OverAll Result</th>
		<th>Pecentage</th>
		<th>Score</th>
		<th>Duration</th>
		<th>Attempt</th>
	</tr>
	<tr>
		<td></td>
		<td><?php echo $total_perc; ?></td>
		<td>
<?php echo $data_sum."/".$key['total_ques']; ?></td>
		<td><?php echo gmdate("H:i:s", $totalDuration);?></td>
		<td><?php echo $total_attempt; ?></td>
	</tr>
</table>
<br>
<table>
	<tr>
		<th>Name</th>
		<th>Pecentage</th>
		<th>Score</th>
		<th>Duration</th>

		<th>View Result</th>
	</tr>
 <?php
	foreach ( $arrData as $key ) {
		
		$end_time = new DateTime ( $key ['end_time'] );
		$start_time = new DateTime ( $key ['start_time'] );
		$diff_time = $end_time->diff ( $start_time );
		$data_perc = ($key ['ques_attempted'] / $key ['total_ques']) * 100;
		echo "<tr><td>" . $key ['first_name'] . " " . $key ['last_name'] . "</td><td>" . $data_perc . "</td><td>" . $key ['score'] . "/" . $key ['total_ques'] . "</td><td>" . $diff_time->format ( '%hh :%mm: %ss' ) . "</td><td><a href='getIndividualResults?id=" . $key ['id'] . "'>click  to View</a></td></tr>";
	}
} else {
	echo "No Records Found";
   }

?>
</table>
</div>