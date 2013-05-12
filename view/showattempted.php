
<?php
echo $_SERVER['REQUEST_URI'];
if(!empty($_SESSION['answers'])) {
	foreach ($arrData as $key => $value) {
		echo "<a href='http://test_scheduler.com".$_SERVER['REQUEST_URI']."?id=1'>";   
		echo $arrData["$key"]['question']."</a>"."<br/>";
		echo $arrData["$key"]['option']."<br/>"."<br/>";
	}
	} else {
	echo "NO Question Answered";
}