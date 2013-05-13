
  <div class="contact-strip bg-mid-gray">Your Attempted / unAttempted Questions</div>
  	<div class="space"></div>
<?php

if(!empty($_SESSION['answers'])) {
	foreach ($arrData as $key => $value) {
		echo "<a href='#' class=submmit_button_generic>";   
		echo $arrData["$key"]['question']."</a>"."<div class=space></div><div class=space></div>";
		echo "<label>".$arrData["$key"]['option']."</label>"."<br/>"."<div class=space></div><div class=space></div>";
	}
	} else {
	echo "NO Question Answered";
}
