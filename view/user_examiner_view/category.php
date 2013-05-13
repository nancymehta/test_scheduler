<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class="para"></div>
<div class = "category_content">

		<a class="button_generic" href="#" id ="addCatergory"> Create new Category</a>
	

<div class="fancybox">
	<div class="box">
	<form action="jasd">

	
		Category Name<input type ="text" name="cat_name"><br><br><br>
		<input type="submit" value="proceed">
		<a href="#" id="close"><img	src="../images/close.png"></a>
	</form>
	</div>
</div>




<div class="space"></div>
	<div class = "category_div">
<!-- abhishek -->
	<form id="addCategoryForm" action="<?php echo SITE_PATH .'category/manageCategory';?>" name="addCategoryForm" method="post">
		<label>Category Name:</label>
		<input type = "text" class="text_right_generic" id = "categoryName" name="categoryName" />
		<div class="space"></div>
		
		<input type = "submit" Value = "Add Category" class="submmit_button_generic"/>
	</form> 
	</div> 
	<div class = "catergory_list">
		<table class = "table-generic">
			
			<?php
			$name	=	array();
			$id		=	array();
			$sno	=	1;

			if(isset($arrData['name'])&&isset($arrData['id']))
		{
			$name	=	$arrData['name'];
			$id		=	$arrData['id'];
		
		?><tr>
				<th>S.NO</th>
				<th>Category</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		<?php
		}
			$count	=	count($name);
			for($i=0;$i<$count;$i++)
			{
			?>
			
			<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $name[$i]; ?></td>
				<!--<td><a href="#" onclick="$('.b1').click()">Edit</a></td>-->
				<td><a href="#" class="font-generic-small" onclick="updateCategory(<?php echo $id[$i].",'".$name[$i]."'";?>)">edit</a></td>
				<td><a href="#" class="font-generic-small" onclick="deleteCategory(<?php echo $id[$i];?>)">delete</a></td>
			</tr>
			<?php
			$sno++;
			}
			?>
		</table>
	</div>
</div>


<!-- There two functions are Added by Abhishek Arora -->
<script type="application/x-javascript">
	
/*function deleteCategory(cat_id) {
	var ans	=	confirm("Are you Sure you want to delete this category ?");
	if (ans	==	true) {
		window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id);
	}
	
}

function updateCategory(cat_id,name) {
	var cat_name	=	name;
	var ans = prompt("Enter the new value of Category",cat_name);
	if(ans==null || ans===false){
	window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id+"&catName="+cat_name);
	}else{
	window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id+"&catName="+ans);
}
}

function checkCategoryValue()
{
	
}*/

</script>




</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>


