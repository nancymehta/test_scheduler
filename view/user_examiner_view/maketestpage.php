<div class = "middle_content">
	<div class = "search_test">
		Search : <input type="text" id = "search-test" name = "search-test"/>
	</div>
	
	<div class = "test_list_div">
		<table class = "test_list">
			<tr>
				<th>S.No.</th>
				<th>Test</th>
				<th colspan = "3">Option</th>
			</tr>
			
			<tr>
				<td>1</td>
				<td>Test</td>
				<td clo><a href = "#">Edit</a></td>
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
	
	<div class = "add_test">
		<form>
			Test Name : <input type = "text" id = "test_name" name = "test_name"/>
			Category Type : <select>
								<option>ABC</option>
								<option>DEF</option>
								<option>GHI</option>
								<option>JKL</option>
							</select>
			
			<input type = "submit" id="submit" name="submit" value = "Submit"/>
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