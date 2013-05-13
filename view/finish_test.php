<div class="space"></div>
<div class="space"></div>

<div class="bigmid">
	<div class="midpanel">

		<!-- midpanel Content gooes here  -->




		<div class="contact-strip bg-mid-gray"><?php echo TEST_FINISHED; ?></div>
		<div class="space"></div>

<?php
/*print_r($arrData);
echo "S";
 print_r($_SESSION);
*/
 if (! empty ( $arrData ) && isset ( $_SESSION ['guest_id'] )) {
    echo NAME . $arrData ['first_name'] . " " . $arrData ['last_name'] . "<br/><br/>";
    echo EMAIL_ENROL . $arrData ['email_enroll_no'] . " <br/><br/>";
    
    echo CORRECT_ANSWER . $arrData ['score'] . " <br/><br/>";
    $percentage = "0";
    if ($arrData ['score'] != 0 && $arrData ['score'] != "") {
        $percentage = (($arrData ['score'] / $arrData ['total_ques']) * 100);
        echo PERCENTAGE. $percentage;
    } else {
        echo ZERO_PERCENTAGE;
    }
    if (@$_SESSION ['pass_marks'] > $percentage) {
        echo "<br><br>".RESULT." : <font style=color:red>".FAIL."</font>";
    } else {
        echo "<br><br>".RESULT." : <font style=color:green> ".PASS." </font>";
    }
} else {
    echo RESULT_NOT_FOUND;
}

?>
<div class="space"></div>
		<form action="#" method="post">

			<textarea name="feedback" class="textarea"> </textarea>

			<div class="space"></div>
			<input type="hidden" name="controller" value="test"> <input
				type="submit" name='function' value="feedback"
				class="submmit_button_generic">
		</form>
		<form action="#" method="post">
			<input type="hidden" name="controller" value="test"> <input
				type="submit" name='function' value="exitTest"
				class="submmit_button_generic">
		</form>
	</div>
	<div class="midright">

		<!-- right content goes here -->
	</div>

</div>

