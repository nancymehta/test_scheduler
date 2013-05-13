<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class="user_overall_result">
<div class="search_test">
<span class="">Select Test </span> <div class="search_test" name="search_test" id="search_test">
	<select name="testSelect">
	<option value="0">select</option>
	<?php foreach($arrData as $key) {
		echo "<option value=".$key['id'].">".$key['name']."</option>";
	}?>
		
	</select>
</div>

</div>

<!-- 
<div class="all_result_table">
<div class="overall" style="text-align:center">


</div>
<table>
<tr>
	<th>OverAll Result</th>
	<th>Pecentage</th>
	<th>Score</th>
	<th>Duration</th>
	<th>Attempt</th>
</tr>
<tr><td></td><td>1</td><td>1</td><td>1</td><td>1</td></tr>
</table>
<br>
<table>
<tr>
	<th>Name 		</th>
	<th>Pecentage</th>
	<th>Score</th>
	<th>Duration</th>

	<th>View Result </th>
</tr>
<tr><td>1</td><td>1</td><td>1</td><td>1</td><td><a href="">click  to View</a></td></tr>
</table>





</div>

</div> -->
</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>