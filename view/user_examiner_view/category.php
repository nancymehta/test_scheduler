<input type = "button" id = "addCatergory"  value = "Create new category"/>
<div class = "category_content">


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
		<span>Category Name:</span><br>
		<input type = "text" id = "categoryName" name="categoryName"/>
		
		<input type = "submit" Value = "Add Category" class="add_category"/>
	</form> 
	</div> 
	<div class = "catergory_list">
		<table class = "category_table">
			<tr>
				<th>S.NO</th>
				<th>Category</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
			
			<tr>
				<th>1</th>
				<td>Category</td>
				<td><a href = "#" class="b1">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>2</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>3</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>4</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>5</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>6</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr>
			
			<tr>
				<th>7</th>
				<td>Category</td>
				<td><a href = "#">Edit</a></td>
				<td><a href = "#">Delete</a></td>
			</tr> 	
		</table>
	</div>
</div>