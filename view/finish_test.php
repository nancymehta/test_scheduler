<br/><br/><br/><br/><br/><br/>
"The TEst is finished NOw "<br/>
<?php 
//print_r($arrData); 

if(!empty($arrData)) {
	echo "Name : ".$arrData['first_name']." ".$arrData['last_name']."<br/>";
	echo "Email/Enroll No : ".$arrData['email_enroll_no']." <br/>";

	echo " Correct Answer : ". $arrData['score']." <br/>";
	echo " Percentage : ".(($arrData['score']/$arrData['total_ques'])*100);

} else {
	echo "Result Not Found";
}


?>
<form action="#" method="post<br/><br/><br/><br/><br/><br/>">
	<input type="hidden" name="controller" value="test" >
	<input type="submit" name='function' value="exitTest">
</form>