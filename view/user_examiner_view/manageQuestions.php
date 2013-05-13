<html>
<?php if(isset($arrData[1])){ ?>
Question/Category Settings
<form action="http://test_scheduler.com/createTest/manageQuestion" method="post">
<table>
<tr>
	<th>Test name</th>
	<th> No of Question</th>
</tr>
	<?php 
	
		for($i=1;$i<=count($arrData);$i++){
			echo '<tr>';
			echo '<td><label>'.$arrData[$i]['categoryName'].'</label></td>';
			echo "<td><input type='text'"."name='noOfQuesForCategoryId_".$arrData[$i]['categoryId']."'"."value='".$arrData[$i]['no_of_ques']."'/></td>";
			echo "<td><input type='hidden'"."name='categoryId_".$arrData[$i]['categoryId']."'"."value='".$arrData[$i]['categoryId']."'/></td>";
			echo '</tr>';		
		} 
	
	?>
	<input type="hidden" name="test_id" value="<?php echo $arrData[1]['test_id'];?>"/>
	<tr>
		<td><input type="submit" value="submit"/></td>
	</tr>
</table>

</form>
<?php } else echo 'no tests added yet !!';?>
</html>
