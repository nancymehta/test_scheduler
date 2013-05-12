
<?php
if(!empty($_SESSION['answers'])) {
	//print_r($arrData); 
	foreach ($arrData as $key => $value) {
		echo $arrData["$key"]['question']."<br/>";
		echo $arrData["$key"]['option']."<br/>"."<br/>";
	}
	} else {
	echo "NO Question Answered";
}