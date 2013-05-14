<div class="full-width bg-light-grey fg-dark-blue floatl font-large ">
<div class="space"></div> Result</div>
<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class="user_overall_result">
<div class="search_test">
<span class="">Select Test </span> <div class="search_test" name="search_test" id="search_test">
	<select name="dddv" id="testSelect">
	<option value="0">select</option>
	<?php foreach($arrData as $key) {
		echo "<option value=".$key['id'].">".$key['name']."</option>";
	}?>
		
	</select>
</div>

</div>

 
<div id="show_result" class="all_result_table">
</div>
</div>

<div class="midright">

<!-- right content goes here -->
</div> 
</div>