
<br>
<div class = "middle_content">
	<div class = "search_test floatl">
		Search : <input type="text" id = "search-test" 
		name = "search-test"/>
	</div>
	<br> <br> <br> <br>
	<div class = "test_list_div">
		<table class = "category_table">
			<tr>
				<th>S.No.</th>
				<th>Test</th>
				<th colspan = "3">Option</th>
			</tr>
			
			<tr>
				<td>1</td>
				<td>Test</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
				<td><a href = "#">Manage assign test</a></td>							
			</tr>
			
			<tr>
				<td>1</td>
				<td>Test</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
				<td><a href = "#">Manage assign test</a></td>							
			</tr>
			
			<tr>
				<td>2</td>
				<td>Test</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
				<td><a href = "#">Manage assign test</a></td>							
			</tr>
			
			<tr>
				<td>3</td>
				<td>Test</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
				<td><a href = "#">Manage assign test</a></td>							
			</tr>
			
			<tr>
				<td>4</td>
				<td>Test</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
				<td><a href = "#">Manage assign test</a></td>							
			</tr>
		</table>
		<a href="#" id = "add_test">Create new test</a>
	</div>
	<br>
	<div class = "add_test colorblue">
		<form>
		Test Name : <input type = "text"  id = "test_name" name = "test_name"/>
		<br><br> Category Type : <select>
								<option>ABC</option>
								<option>DEF</option>
								<option>GHI</option>
								<option>JKL</option>
							</select>
			<br> <br>
			<input type="submit" class="bluebutton" id="submit" name="submit"  value="Submit"/>
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