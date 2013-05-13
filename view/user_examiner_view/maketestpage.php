<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->


<div class="middle_content">
		<label>Search : </label><input type="text" class="text_right_generic" id="search-test" name="search-test" />
		<div class="space"></div>
		<a class="button_generic" href="#" id ="add_test">Create new test</a>

	<div class="space"> </div	>
	<div class="add_test">
		<form method="post"
			action="http://test_scheduler.com/createTest/createNewTest"><div class="space"></div>
			<label>Test Name :</label> <input type="text" class="text_right_generic" id="test_name" name="test_name" /><div class="space"> </div>
			<label>Category Type :</label>  <select id="category_name" class="select_generic"
				name="category_name[]" >
								<?php
								$i = 0;
								while ( (! empty ( $arrData ['category'] ['category_name'] [$i] )) ) {
									echo "<option>";
									print_r ( $arrData ['category'] ['category_name'] [$i] );
									echo "</option>";
									$i ++;
								}
								?>
							</select> <div class="space"> </div> <input type="submit" 
				id="submit" name="submit" value="Submit" class="submmit_button_generic"/>
		</form>
	</div>
	<div class="space"></div>
		<table class="table-generic table1" id="shubh">
			<thead><tr>
				<th>S.No.</th>
				<th>Test</th>
				<th colspan="4">Option</th>
				<th>Test Link</th>
			</tr>
			</thead>
			<tbody>
			<?php
			$i = 0;
			$count = 0;
			echo '<pre>';
			if (isset ( $arrData ['test'] ['testName'] )) {
				while ( (! empty ( $arrData ['test'] ['testName'] [$i] )) ) {
					echo '<tr>';
					echo '<td>' . ++ $count . '</td>';
					echo '<td>';
					print_r ( $arrData ['test'] ['testName'] [$i] );
					echo '</td>';
					echo '<td><a href="http://test_scheduler.com/createTest/editTest?test_id=' . $arrData ['test'] ['testId'] [$i] . '&test_name=' . $arrData ['test'] ['testName'] [$i] . '">Edit</a></td>';
					echo '<td><a href="#">Delete</a></td>';
					echo '<td><a href="http://test_scheduler.com/user/manageQuestions?test_id='.$arrData ['test'] ['testId'] [$i].'">Manage Questions</a></td>';
					echo '<td><a href="http://test_scheduler.com/user/examSettings?test_id=' . $arrData ['test'] ['testId'] [$i] . '&test_name=' . $arrData ['test'] ['testName'] [$i] . '">Manage assign test</a></td>';
					echo "<td>test_scheduler.com/path/to/test/".md5($arrData ['test'] ['testId'][$i])."</td>";
					$i ++;
					echo '</tr>';
				}
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
 </tbody>
		</table>
	
</div>




</div>

</div>

