<html>
<script>
		function fncRandomOrder(){
			$.ajax({
				type:"POST",		
				url:"http://test_scheduler.com/createTest/manageQuestion", 
				data:$("#frmManageQuestions").serialize(),  
				success:function(result){  
					alert(result);
					location.reload();
				}
			});
		}
		function fncManualOrder(){
			$("#tblRandom").hide();
			$('#totalQues').attr('readOnly','');
			$.ajax({
				type:"POST",		
				url:"http://test_scheduler.com/user/manualOrder", 
				data:$("#frmManageQuestions").serialize(),  
				success:function(result){  
					$("#manualOrderResults").html(result);
				}
			});
		}
		function fncSubmitManually(){
			$.ajax({
				type:"POST",		
				url:"http://test_scheduler.com/createTest/manualOrder", 
				data:$("#frmManualQuestions").serialize(),  
				success:function(result){  
					alert(result);
					location.reload();
				}
			});
		}
	</script>
<?php if(isset($arrData[1])){ ?>
Question/Category Settings
<form action="http://test_scheduler.com/createTest/manageQuestion"
	method="post" id="frmManageQuestions" name="frmManageQuestions">
	Total No Of Questions In Test : <input type="text" class="max-length" name="totalQues"
		id="totalQues" value="<?php echo $arrData['total_ques'];?>">
	<table id="tblRandom">
		<tr>
			<th>Test name</th>
			<th>No of Question</th>
		</tr>
	<?php
	
	for($i = 1; $i <= count ( $arrData ); $i ++) {
		if (isset ( $arrData [$i] )) {
			echo '<tr>';
			echo '<td><label>' . $arrData [$i] ['categoryName'] . '</label></td>';
			echo "<td><input type='text' class='max-length" . "name='noOfQuesForCategoryId_" . $arrData [$i] ['categoryId'] . "'" . "value='" . $arrData [$i] ['no_of_ques'] . "'/></td>";
			echo "<td><input type='hidden'" . "name='categoryId_" . $arrData [$i] ['categoryId'] . "'" . "value='" . $arrData [$i] ['categoryId'] . "'/></td>";
			echo '</tr>';
		}
	}
	
	?>
	<input type="hidden" name="test_id"
			value="<?php echo $arrData[1]['test_id'];?>" />
		<tr>
			<td><input type="button" name="randomOrder" id="randomOrder"
				value="Random Order" onclick="fncRandomOrder()">
			
			<td><input type="button" name="manualOrder" id="manualOrder"
				value="Select Questions Manually" onclick="fncManualOrder()">
		
		</tr>
	</table>
</form>
<div id="manualOrderResults"></div>
<?php } else echo 'no tests added yet !!';?>
</html>
