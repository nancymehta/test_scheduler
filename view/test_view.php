
<?php 


//print_r($_SESSION);
//$_SESSION['question']=0; 

if(!empty($arrData)) {
$quesNo=$_SESSION['questions'][$_SESSION['question']];
$type=$arrData["$quesNo"]['ques_type_id'];
$questionId=$arrData["$quesNo"]['question_id'];
$options= $arrData[$quesNo."opt"];

?>
<br/><br/><br/><br/><br/><br/>
<form method="post" action="#" > 
<input type='hidden' value='<?php echo $questionId; ?>' name='question_id'>
<?php
echo ($_SESSION['question']+1); //serial no.
echo " Question ".$arrData["$quesNo"]['question']."<br/>";
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
<input type=submit name="function" value="prev">
<input type=submit name="function" value="next">
</form>

<a href="<?php echo SITE_PATH."test/finishTest"; ?>" >FINISH TEST</a>
<?php } else {
	?>
 <br/> test Empty <br/>
 <form action="#" method="post<br/><br/><br/><br/><br/><br/>">
	<input type="hidden" name="controller" value="test" >
	<input type="submit" name='function' value="exitTest">
</form>
 <?php
}
?>
<button onclick="showAttempted()">Show Attempted</button>
<div id="showattemped"></div>


<script type="text/javascript">
function showAttempted() {
	$("#showattemped").load("index.php","controller=test&function=showAttempted");
}
</script>
