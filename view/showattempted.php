
  <div class="contact-strip bg-mid-gray">Your Attempted Questions</div>
  	<div class="space"></div>
<?php
print_r($arrData);
if(!empty($_SESSION['answers'])) {
	foreach ($arrData as $key => $value) {
		if(!empty($value)) {
		echo "<a href='".SITE_PATH."test/home".@$_SESSION['test_url']."' class=submmit_button_generic>";   
		echo $arrData["$key"]['question']."</a>"."<div class=space></div><div class=space></div>";
		echo "<label>Your Answer : ".$arrData["$key"]['option']."</label>"."<br/>"."<div class=space></div><div class=space></div>";
		}
	}
}else {
	echo "NO Question Answered";
}
