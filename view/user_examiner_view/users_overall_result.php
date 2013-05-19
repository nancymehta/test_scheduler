  
<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class="user_overall_result">

<div class="search_test fg-dark-blue" name="search_test" id="search_test">
	Select Test   <select class="margin-left-10" name="dddv" id="testSelect">
	<option value="0">select</option>
	<?php foreach($arrData as $key) {
		echo "<option value=".$key['id'].">".$key['name']."</option>";
	}?>
		
	</select>
</div>



 
<div id="show_result" class="all_result_table">
</div>
</div>

</div>