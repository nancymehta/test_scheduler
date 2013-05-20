<?php
if(isset($arrData['test_taker_details'])){
	$test_taker_result=$arrData['test_taker_details']; 
   foreach($test_taker_result as $key)
   {
   	$end_time = new DateTime($key['end_time']);
 	$start_time = new DateTime($key['start_time']);
 	$diff_time=$end_time->diff($start_time);
 	$data_perc=($key['score']/$key['total_ques'])*100;
   	?>
<div class="user-result">

<table class="table-generic datatable">
	<tr><td>Name of Exam Taker</td><td> <?php echo $key['first_name']." " .$key['last_name']; ?></td> </tr>
    <tr><td>Ip Address</td><td> <?php echo $key['ip_address'];?></td> </tr>
<tr><td> Id  Assigned </td><td><?php echo $key['id']; ?></td></tr>
<tr> <td>Score </td> <td><?php echo $key['score']."/".$key['total_ques']; ?></td></tr>
<tr><td>Percentage </td><td><?php echo $data_perc;?></td></tr>
<tr><td>Duration </td><td><?php echo $diff_time->format('%hh :%mm: %ss');?></td></tr>
<tr> <td>Date Started </td> <td><?php echo $key['start_time'];?></td></tr>
<tr> <td>Date Finished </td> <td><?php echo $key['end_time'];?></td> </tr>
<tr> <td>Email</td> <td><?php echo $key['email_enroll_no'];?></td></tr>

</table>

   

	<!-- <span class="floatl">Name of Exam Taker : </span> <label class="floatr" id="user-result-name" name="user-result-name"><?php echo $key['first_name']." " .$key['last_name']; ?></label>
	<br>
	<br>
	<span class="">Ip Address : </span> <label class="" id="user-result-ip" name="user-result-ip"><?php echo $key['ip_address'];?></label>  
	<br>
	<span class="">Id  Assigned  : </span> <label class="" id="user-result-id" name="user-result-id"><?php echo $key['id']; ?></label>  
	<hr> -->
	<!-- <span class="">Score   : </span> <label class="" id="user-result-score" name="user-result-score"><?php echo $key['score']."/".$key['total_ques']; ?></label>  <br>
	<span class="">Percentage :</span> <label class="" id="user-result-per" name="user-result-per"><?php echo $data_perc;?></label>  <br>
	<span class="">Duration :</span> <label class="" id="user-result-duration" name="user-result-duration"><?php echo $diff_time->format('%hh :%mm: %ss');?></label>  <br>
	<span class="">Date Started : </span> <label class="" id="user-result-date" name="user-result-date"><?php echo $key['start_time'];?></label>  <br>
 -->
	<!-- <span class="">Date Finished : </span> <label class="" id="user-result-dateend" name="user-result-dateend"><?php echo $key['end_time'];?></label>  <br>
	<hr>
	<span class="">Email : </span> <label class="" id="user-result-mail" name="user-result-mail"><?php echo $key['email_enroll_no'];?></label>  <br>
	
	 -->
<br><br>	<div class="wrong-right-questions fg-mid-blue" style="text-align:center; height:20px; width:100%;">

	<?php 
		echo "Total Score: ".$key['score']." out of ".$key['total_ques']; 	
   		}
	} else {
   			echo NO_RECORDS_FOUND;
   		}
   ?> 
   
<br><br><br><br>

</div>

<DIV class="space"></DIV><DIV class="space"></DIV>
<div class="result_question"><br>
<h2 class="fg-dark-blue margin-left-250" >Attempted Questions </h2>
	<div class="questionanswers">
		<?php
			if(isset($arrData['question_details'])) {
				$question_details=$arrData['question_details'];
				echo "<pre>";
				//print_r($question_details);echo "</pre>";
				$count=0;
				$question_num=1;
				$correct="";
				foreach($question_details as $key =>$value) {
					if(!$count) {
						$question=$value['question'];
						echo "<br/>Q".$question_num."  ".$question."<br/>";
						if($value['id']==$value['answer_given']) {
							echo "<h6 style='font-weight:bold;'><pre>	      ".$value['option']."</h6></pre>";						
						} else {
							echo "<pre>		".$value['option']."</pre>";
						}
						$question_num++;
						$count++;
					} else if($question==$value['question']) {
							if($value['id']==$value['answer_given']) {
								echo "<h6 style='font-weight:bold;'><pre>	      ".$value['option']."</h6></pre>";
							} else {
								echo "<pre>		".$value['option']."</pre>";
							}
					} else {
						//$count=0;
						echo "<br/><div class='fg-mid-blue'>Correct Option : " . $correct."</div>";
						$question=$value['question'];
						echo "<br/><br/>Q".$question_num."  ".$question."<br/>";
						if($value['id']==$value['answer_given']) {
									echo "<h6 style='font-weight:bold;'><pre>	     ".$value['option']."</h6></pre>";						
								} else {
									echo "<pre>		".$value['option']."</pre>";
								}
						$question_num++;
					}
					if($value['correct']) {
						$correct=$value['option'];
					}
					
				}
				echo "<br/><div class='fg-mid-blue'>	Correct Option : " . $correct."</div>";
			} else {
				echo NO_RECORDS_FOUND;
			}			 
		?>		
		 
	</div>
	

</div>

</div>

