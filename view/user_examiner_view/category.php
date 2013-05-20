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


<?php 
/*
 * @Auther	--	Abhishek Arora
 * This form is used for adding new Category
 */?>
	<form id="addCategoryForm" action="<?php echo SITE_PATH .'category/manageCategory';?>" name="addCategoryForm" method="post">
		<label>Category Name:</label>
		<input type = "text" class="text_right_generic max-length" id = "categoryName" name="categoryName" />
		<div class="space"></div>
		
		<input type = "submit" Value = "Add Category" class="submmit_button_generic"/>
	</form> 
	</div> 
	<div class = "catergory_list">
		<table class = "table-generic table1">
			
			<?php
			$name	=	array();
			$id		=	array();
			$sno	=	1;

			if(isset($arrData['name'])&&isset($arrData['id']))
		{
			$name	=	$arrData['name'];
			$id		=	$arrData['id'];
		
		?><thead><tr>
				<th>S.NO</th>
				<th>Category</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr></thead><tbody>
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
				<td><a href="#" style="background-color:white;margin-top: 5px;" class="font-generic-small" onclick="updateCategory(<?php echo $id[$i].",'".$name[$i]."'";?>)"><img style="height:24px;width:24px;" src="<?php echo IMAGE_PATH;?>/editb.jpg"></img></a></td>
				<td><a href="#" style="background-color:white;margin-top: 5px;" class="font-generic-small" onclick="deleteCategory(<?php echo $id[$i];?>)"><img  src="<?php echo IMAGE_PATH;?>/delete.gif"></img></a></td>
			</tr>
			<?php
			$sno++;
			}
			?></tbody>
		</table>
	</div>
</div>

</div>
<div class="midright">

<!-- right content goes here -->
</div> 

</div>

<script>
function deleteCategory(cat_id) {
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
</script>

