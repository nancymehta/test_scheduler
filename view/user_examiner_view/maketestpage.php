
<br>
<div class="middle_content">
	<div class="search_test floatl">
		Search : <input type="text" id="search-test" name="search-test" />
	</div>
	<br> <br> <br> <br>
	<div class="test_list_div">
		<table class="category_table">
			<tr>
				<th>S.No.</th>
				<th>Test</th>
				<th colspan="3">Option</th>
			</tr>
			<?php
			$i = 0;
			$count=0;
			while ( (! empty ( $arrData ['test'] ['testName'] [$i] )) ) {
				echo '<tr>';
				echo '<td>'.++$count.'</td>';
				echo '<td>';
				print_r ( $arrData ['test'] ['testName'] [$i] );
				echo '</td>';
				echo '<td><a href="http://test_scheduler.com/createTest/editTest?test_id='.$arrData ['test'] ['testId'] [$i].'">Edit</a></td>';
				echo '<td><a href="#">Delete</a></td>';
				echo '<td><a href="#">Manage assign test</a></td>';
				$i ++;
				echo '</tr>';
			}
			?>
<!-- 
			<tr>
				<td>1</td>
				<td>Test</td>
				<td><a href="#">Edit</a></td>
				<td><a href="#">Delete</a></td>
				<td><a href="#">Manage assign test</a></td>
			</tr>
 -->
		</table>
		<a href="#" id="add_test">Create new test</a>
	</div>
	<br>
	<div class="add_test colorblue">
		<form method="post"
			action="http://test_scheduler.com/createTest/createNewTest">
			Test Name : <input type="text" id="test_name" name="test_name" /> <br>
			<br> Category Type : <select id="category_name" name="category_name[]" multiple>
								<?php
								$i = 0;
								while ( (! empty ( $arrData ['category'] ['category_name'] [$i] )) ) {
									echo "<option>";
									print_r ( $arrData ['category'] ['category_name'] [$i] );
									echo "</option>";
									$i ++;
								}
								?>
							</select> <br> <br> <input type="submit" class="bluebutton"
				id="submit" name="submit" value="Submit" />
		</form>
	</div>
</div>

<script>
$(document).ready(function() {
	$("#add_test").click(function(){
		$(".add_test").show();
	});
});
</script>