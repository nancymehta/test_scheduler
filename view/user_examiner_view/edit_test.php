<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<?php //print_r($arrData);?>
<div class="add_test colorblue">
	<form method="post"
		action="http://test_scheduler.com/createTest/updateTest"
		id="add_test_form" name="add_test_form">
		<label>Test Name : </label><input type="text" id="test_name" name="test_name"
			value="<?php print_r($arrData['testName']);?>" class="text_right_generic-small"/>
		<?php //echo '<pre>';print_r($arrData);die("here");?>
		
		<div class="space"></div>

		<label>Category Type : </label><select id="category_name" name="category_name[]"
			multiple class="select_generic">
								<?php
								$i = 0;
								while ( (! empty ( $arrData ['category'] ['category_name'] [$i] )) ) {
									echo "<option>";
									print_r ( $arrData ['category'] ['category_name'] [$i] );
									echo "</option>";
									$i ++;
								}
								?>
							</select> <input type="hidden" name="testId"
			value="<?php print_r($arrData['test_id']);?>"> <div class="space"></div><input
			type="submit" class="submmit_button_generic" id="submit" name="submit"
			value="Submit" />
	</form>
</div>
</div>
<div class="midright">

<!-- right content goes here -->
</div> 
</div>
