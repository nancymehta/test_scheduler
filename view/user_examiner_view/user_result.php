
<?php
	echo "<pre>"; 
print_r($arrData); ?>
<?php
	$test_taker_result=$arrData['test_taker_details']; 
   foreach($test_taker_result as $key)
   {
   	$end_time = new DateTime($key['end_time']);
 	$start_time = new DateTime($key['start_time']);
 	$diff_time=$end_time->diff($start_time);
 	$data_perc=($key['score']/$key['total_ques'])*100;
   	?>
<div class="user-result">

	<span class="">Name of Exam Taker : </span> <label class="" id="user-result-name" name="user-result-name"><?php echo $key['first_name']." " .$key['last_name']; ?></label>
	<br>
	<br>
	<span class="">Ip Address : </span> <label class="" id="user-result-ip" name="user-result-ip"><?php echo $key['ip_address'];?></label>  
	<br>
	<span class="">Id  Assigned  : </span> <label class="" id="user-result-id" name="user-result-id"><?php echo $key['id']; ?></label>  
	<hr>
	<span class="">Score   : </span> <label class="" id="user-result-score" name="user-result-score"><?php echo $key['score']."/".$key['total_ques']; ?></label>  <br>
	<span class="">Percentage :</span> <label class="" id="user-result-per" name="user-result-per"><?php echo $data_perc;?></label>  <br>
	<span class="">Duration :</span> <label class="" id="user-result-duration" name="user-result-duration"><?php echo $diff_time->format('%hh :%mm: %ss');?></label>  <br>
	<span class="">Date Started : </span> <label class="" id="user-result-date" name="user-result-date"><?php echo $key['start_time'];?></label>  <br>

	<span class="">Date Finished : </span> <label class="" id="user-result-dateend" name="user-result-dateend"><?php echo $key['end_time'];?></label>  <br>
	<hr>
	<span class="">Email : </span> <label class="" id="user-result-mail" name="user-result-mail">sourab@gmail.com</label>  <br>
	<br>
	
	<div class="wrong-right-questions" style="text-align:center; height:20px; width:100%; background-color:#eee">

	<?php echo $key['score']." out of ".$key['total_ques'];?> 


</div>
<br>
	<div class="questionanswers">
		Q1. blah blah ... 
		 
	</div>
	<?php } ?>



</div>