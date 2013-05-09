
<div class="para"></div>
<div class = "category_content">
<a href="#" id ="addCatergory" class="bt-blue-generic ft-blue-generic addtest"> Create new Category</a>


<div class="fancybox">
	<div class="box">
	<form action="jasd">

	
		Category Name<input type ="text" name="cat_name"><br><br><br>
		<input type="submit" value="proceed">
		<a href="#" id="close"><img	src="../images/close.png"></a>
	</form>
	</div>
</div>





	<div class = "category_div">
<!-- abhishek -->
	<form id="addCategoryForm" action="<?php echo SITE_PATH .'category/manageCategory';?>" name="addCategoryForm" method="post">
		<span class="ft-blue-generic ">Category Name:</span><br>
		<input type = "text" id = "categoryName" name="categoryName" />
		
		<input type = "submit" Value = "Add Category" class="add_category ft-blue-generic"/>
	</form> 
	</div> 
	<div class = "catergory_list">
		<table class = "category_table">
			
			<?php
			$name	=	array();
			$id	=	array();
			$sno	=	1;

			if(isset($arrData['name'])&&isset($arrData['id']))
		{
			$name	=	$arrData['name'];
			$id	=	$arrData['id'];
		
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
				<td><a href="#" onclick="updateCategory(<?php echo $id[$i].",'".$name[$i]."'";?>)">Edit</a></td>
				<td><a href="#" onclick="deleteCategory(<?php echo $id[$i];?>)">Delete</a></td>
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
	
function deleteCategory(cat_id) {
	var ans	=	confirm("Are you Sure you want to delete this category");
	if (ans	==	true) {
		window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id);
	}
	
}

function updateCategory(cat_id,name) {
	var cat_name	=	name;
	var ans = prompt("Enter the new value of Category",cat_name)
	window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id+"&cat_name="+ans);
}

</script>



