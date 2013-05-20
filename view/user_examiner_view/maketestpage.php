  
<div class="bigmid">

	<div class="midpanel" style="width: auto;">

		<!-- midpanel Content gooes here  -->


		<div class="middle_content">
			<script>
	function fncDelete(testId){
		if(confirm('Are You Sure')) {
			$.ajax({
				type:"POST",
				url:"http://test_scheduler.com/createTest/deleteTest",
				data:"id="+testId,
				success:function(result){
					alert(result);
					location.reload();
					}
			});//ajax function ends here
		}
	}
	
	function fncEnableDisable(testId,status){
		if(confirm('Are You Sure')) {
			$.ajax({
				type:"POST",
				url:"http://test_scheduler.com/createTest/enableDisableTest",
				data:"test_id="+testId+"&status="+status,
				success:function(result){
					alert(result);
					location.reload();
					}
			});//ajax function ends here
		}
	}
</script>
			
			<div class="space"></div>
			<a class="button_generic" href="#" id="add_test">Create new test</a>

			<div class="space"></div>
			<div class="add_test" id="new_test_div">
				<form method="post"
					action="http://test_scheduler.com/createTest/createNewTest" id = "add_test_form">
					<div class="space"></div>
					<label>Test Name :</label> <input type="text"
						class="text_right_generic" id="test_name" name="test_name" />
					<div class="space"></div>
					
					<label>Category Type :</label> <select id="category_name"
						class="select_generic" name="category_name[]" multiple>
								<?php
								$i = 0;
								while ( (! empty ( $arrData ['category'] ['category_name'] [$i] )) ) {
									echo "<option selected>";
									print_r ( $arrData ['category'] ['category_name'] [$i] );
									echo "</option>";
									$i ++;
								}
								?>
							</select>
						
					<div class="space"></div>
					<input type="submit" id="submit" name="submit" value="Submit"
						class="submmit_button_generic" />
						
						</form>
			</div>
			<div class="space"></div>
			<table class="table-generic table1" id="shubh">
				<thead>
					<tr>
						<th>S.No.</th>
						<th>Test</th>
						<th colspan="6">Option</th>
						<th>Test Link</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$i = 0;
			$count = 0;
			if (isset ( $arrData ['test'] ['testName'] )) {
				while ( (! empty ( $arrData ['test'] ['testName'] [$i] )) ) {
					echo '<tr>';
					echo '<td>' . ++ $count . '</td>';
					echo '<td>';
					print_r ( $arrData ['test'] ['testName'] [$i] );
					echo '</td>';
					echo '<td><a style="background-color:white;margin-top: 5px;"  href="http://test_scheduler.com/createTest/editTest?test_id=' . $arrData ['test'] ['testId'] [$i] . '&test_name=' . $arrData ['test'] ['testName'] [$i] . '"><img style="height:24px;width:24px;" src="'.IMAGE_PATH.'/editb.jpg" ></img></a></td>';
					
					 echo "<td><a style=background-color:white;margin-top:5px; onclick=fncDelete(".$arrData ['test'] ['testId'] [$i].")><img src=".IMAGE_PATH."delete.gif></img></a></td>";
					 if($arrData ['test'] ['testStatus'] [$i] == '0'){
						echo "<td><a href='#' onclick=fncEnableDisable(".$arrData ['test'] ['testId'] [$i].",2".")>Disable Test</a></td>";
					} elseif ($arrData ['test'] ['testStatus'] [$i] == '2') {
						#first arguement is test id and next is status
						echo "<td><a href='#' onclick=fncEnableDisable(".$arrData ['test'] ['testId'] [$i].",0".")>Enable Test</a></td>";
					}
					echo '<td><a href="http://test_scheduler.com/user/manageQuestions?test_id='.$arrData ['test'] ['testId'] [$i].'">Manage Questions</a></td>';
					echo '<td><a href="http://test_scheduler.com/user/examSettings?test_id=' . $arrData ['test'] ['testId'] [$i] . '&test_name=' . $arrData ['test'] ['testName'] [$i] . '">Manage assign test</a></td>';
					$temp=$arrData ['test'] ['testId'][$i].$arrData ['test'] ['testName'][$i];
					echo '<td><a href="#">Mail Link</a></td>';
					echo "<td><input type='text' value='test_scheduler.com/test/home/".md5($temp)."' readonly></td>";
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

