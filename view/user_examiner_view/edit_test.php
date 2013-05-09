<div class = "add_test colorblue">
<form method="post" action="http://test_scheduler.com/createTest/createNewTest" id="add_test_form" name="add_test_form">
Test Name : <input type = "text"  id = "test_name" name = "test_name"/>
		<?php print_r($arrData);?>
		<br><br> Category Type : <select id="categor_name" name="category_name" multiple>
								<option>ABC</option>
								<option>DEF</option>
								<option>GHI</option>
								<option>JKL</option>
							</select>
			<br> <br>
			<input type="submit" class="bluebutton" id="submit" name="submit"  value="Submit"/>
		</form>
</div>