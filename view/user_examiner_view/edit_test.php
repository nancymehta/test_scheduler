<div class = "add_test colorblue">
<form method="post" action="http://test_scheduler.com/createTest/updateTest" id="add_test_form" name="add_test_form">
Test Name : <input type = "text"  id = "test_name" name = "test_name" value="<?php print_r($arrData['testName']);?>"/>
		<?php //echo '<pre>';print_r($arrData);die("here");?>
		<br><br> Category Type : <select id="category_name" name="category_name[]" multiple>
								<?php
								$i = 0;
								while ( (! empty ( $arrData ['category'] ['category_name'] [$i] )) ) {
									echo "<option>";
									print_r ( $arrData ['category'] ['category_name'] [$i] );
									echo "</option>";
									$i ++;
								}
								?>
							</select>
			<input type="hidden" name="testId" value="<?php print_r($arrData['test_id']);?>">
			<br> <br>
			<input type="submit" class="bluebutton" id="submit" name="submit"  value="Submit"/>
		</form>
</div>