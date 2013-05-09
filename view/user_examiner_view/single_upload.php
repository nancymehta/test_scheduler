<html>
<head>
	<title>Upload Questions</title>
	<script type="text/javascript" src="jquery-1.9.1.js">

	</script>
	<style type="text/css">
	.single_upload_main{
		width:100%;
		height:100%;
		
	}
	.single_upload_main input[type='text']{
		width: 300px;
		float: left;
		
	}
	.single_upload_main .marginl40{
	margin-left: 60px;
	}
	.innerdiv{
	border-bottom-style: dotted; 
    border-bottom-width:1px;
	border-bottom-color: grey;
	height: auto;
	width: 500px;
	
	}
	
	
	</style>
</head>
<body>
<?php //print_r($arrData)?>
<br>
<br>
			<a class="colorblue floatr" href = "<?php echo SITE_PATH."testui/bulk_upload"; ?>">Add More Questions</a>
	<div>
		<form action="<?php echo SITE_PATH .'questionBank/singleUploadController';?>" name="login_form" method="post"><br>
			<div class="single_upload_main">
			
				<br>
				<div class="innerdiv">
				<label >
					Question type:
				</label>
				<select  >
					<option value="0">mcq</option>
					<option value="1">true/false</option>
				</select>
				</div><br>
					<div class="innerdiv">
				<label>
					Category:
				</label>
				<select >
				<!--<option value="0">PHP</option>
					<option value="1">MYSQL</option> 
				-->
				<?php
				if(isset($arrData)){
	                 $i = 0;
	                 while ( (! empty($arrData['category_name'][$i] )) ) {
	                 echo "<option>";
	                 echo ($arrData['category_name'] [$i] );
	                 echo "</option>";
	                 $i ++;
	                 }
	            }
	            else{
	            	echo "<option>no test category</option>";
	            }
                ?>
					
				</select></div>
				<br> <br><div class="innerdiv">
				<label class="floatl">Type Qestion here:</label><input  type="text" name="question" id="question">
				<br><br></div>
	           <br>
	           <div class="innerdiv">
	            Add Options Here
				<table class="s_upload_table" >
					<tr>
						
							<input type="button" id="addButton" value="Add Options"/>
							<input type="button" id="removeButton" value="Delete Options"/>
						
					</tr>
					<tr>
						<th>
							Options
						</th>
						<th>
							Answer
						</th>
						<th>
							Feedback
						</th>
					</tr>
					<tr>
						<td>
							<div class="test">
							</div>
							<textarea cols=15 rows=1 id="ques1" name="ques1"></textarea>
						</td>
						<td>
							<input type="checkbox" id="check1" name="check1">
						</td>
						<td>
							<textarea cols=15 rows=1 id="feedback1" name="feedback1"></textarea> 
						</td>
					</tr>
					<tr>
						<td>
							<div class="test">
							</div>
							<textarea cols=15 rows=1 id="ques2" name="ques2"></textarea>
						</td>
						<td>
							<input type="checkbox" id="check2" name="check2">
						</td>
						<td>
							<textarea cols=15 rows=1 id="feedback2" name="feedback2"></textarea> 
						</td>
					</tr>
				</table>
		</div>
				<br>
				
			</div>
            <input type="submit" name='submit' value="Submit"/> 
		</form>
	</div>
</body>
</html>
<script>
$(document).ready(function(){
	var v1 = 3;
	   $("#addButton").click(function (){
		  if(v1>5){
	            alert("Maximum 5");
	            return false;
			}   
			$('.s_upload_table').append('<tr id="dynamic"><td><textarea cols=15 rows=1 id=ques'+v1+' name=ques'+v1+'></textarea></td><td><input type="checkbox" id=check'+v1+' name=check'+v1+' /></td><td><textarea cols=15 rows=1 id=feedback'+v1+' name=feedback'+v1+'></textarea> </td></tr>');
			v1++;	
		});
	   $("#removeButton").click(function () {
		   if(v1==3){
			      alert("Minimum 2");
		          return false;
		       }
	       v1--;
	        $("#dynamic").remove();  	
		});
});
</script>