
<!-- midpanel Content gooes here  -->

<?php 


//print_r($_SESSION);
//$_SESSION['question']=0; 

if(!empty($arrData)) {
$quesNo=$_SESSION['questions'][$_SESSION['question']];
$type=$arrData["$quesNo"]['ques_type_id'];
$questionId=$arrData["$quesNo"]['question_id'];
$options= $arrData[$quesNo."opt"];

?>
<form method="post" action="#" > 
<input type='hidden' value='<?php echo $questionId; ?>' name='question_id'>


  <div class="contact-strip bg-mid-gray">
<?php
echo "<font style=color:black;>  ".($_SESSION['question']+1)." .</font>"; //serial no.
echo " Question ".$arrData["$quesNo"]['question']."<br/>";
echo "</div>";
echo "<br><br><br>";
shuffle($options);

foreach($options as $val) {
	$checked="";
	if(in_array($val['id'],$_SESSION['answers'])) {
		$checked="checked";
	}
	if(!empty($val)) {
		//for MCQ
		if($type==5 || $type==6 || $type==7) {
			echo "<input type='radio' name='coption' value='".$val['id']."' $checked >";
		}
		//true false question but for this user must have valid
		//entry in db seprately 
		if($type==6) {
		//	echo "<input type='checkbox' name='coption' value='".$val['id']."' $checked >";

		}
		// for check box
		if($type==7) {
		}
		echo $val['option']."<br>";
	}
} 

?>
<input type="hidden" name="controller" value="test" >
<div class="next_prev">
<input type=submit name="function" value="prev"  class="submmit_button_generic bg-fg-button-color">
<input type=submit name="function" value="next" class="submmit_button_generic bg-fg-button-color">
</div>
</form>
<hr>
<a href="<?php echo SITE_PATH."test/finishTest"; ?>" class="submmit_button_generic " >FINISH TEST</a>
<div class="space"></div>
<?php } else {
	?>
 <br/> test Empty <br/>
 <form action="#" method="post">
	<input type="hidden" name="controller" value="test" >
	<input type="submit" name='function' value="exitTest" class="submmit_button_generic">
</form>
 <?php
}
?>
<button onclick="showAttempted()" class="submmit_button_generic">Show Attempted</button>
<div id="showattemped"></div>


<script type="text/javascript">
function showAttempted() {
	$("#showattemped").load("index.php","controller=test&function=showAttempted");
}
</script>
