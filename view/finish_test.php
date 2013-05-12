<br/><br/><br/><br/><br/><br/>
"The TEst is finished NOw "<br/>
<?php 
//print_r($arrData); 
//print_r($_SESSION); 
if(!empty($arrData) && isset($_SESSION['guest_id'])) {
	echo "Name : ".$arrData['first_name']." ".$arrData['last_name']."<br/>";
	echo "Email/Enroll No : ".$arrData['email_enroll_no']." <br/>";

	echo " Correct Answer : ". $arrData['score']." <br/>";
	$percentage="0";
	if($arrData['score']!=0 && $arrData['score']!="" ) {
		$percentage=(($arrData['score']/$arrData['total_ques'])*100);
		echo " Percentage : ".$percentage;	
	} else {
		echo " Percentage : 0.0%";
	}
	if(@$_SESSION['pass_marks']>$percentage) {
		echo "RESULT : FAIL";
	} else {
		echo "RESULT : PASS";
	}
	

} else {
	echo "Result Not Found";
}


?>
<form action="#" method="post<br/><br/><br/><br/><br/><br/>">
<textarea> </textarea>
	<input type="submit" name='function' value="feedback">
</form>
<form action="#" method="post<br/><br/><br/><br/><br/><br/>">
	<input type="hidden" name="controller" value="test" >
	<input type="submit" name='function' value="exitTest">
</form>