<html>
<head>
	<title>Upload Questions</title>
	<script type="text/javascript" src="jquery-1.9.1.js">

	</script>
	<style type="text/css">
	.single_upload_main{
		width:100%;
		height:100%;
		border: solid 1px;
	}
	.single_upload_table{
		border: solid 1px;
	}
	</style>
</head>
<body>
	<div>
		<form method="post">
			<div class="single_upload_main">
				<label>
					Question type:
				</label>
				<select>
					<option value="0">mcq</option>
					<option value="1">true/false</option>
				</select>
				<br/>
				<label>
					Category:
				</label>
				<select>
					<option value="0">PHP</option>
					<option value="1">MYSQL</option>
				</select>
				<table class="single_upload_table">
					<tr>
						<td>
							<input type="button" id="addButton" value="Add Options"/>
							<input type="button" id="removeButton" value="Delete Options"/>
						</td>
					</tr>
					<tr>
						<td>
							Options
						</td>
						<td>
							Answer
						</td>
						<td>
							Feedback
						</td>
					</tr>
					<tr>
						<td>
							<div class="test">
							</div>
							<textarea cols=10 rows=5 id="ques1" name="ques1"></textarea>
						</td>
						<td>
							<input type="radio" id="radio1" name="radio1">
						</td>
						<td>
							<textarea cols=10 rows=5 id="feedback1" name="feedback1"></textarea> 
						</td>
					</tr>
					<tr>
						<td>
							<div class="test">
							</div>
							<textarea cols=10 rows=5 id="ques2" name="ques2"></textarea>
						</td>
						<td>
							<input type="radio" id="radio2" name="radio2">
						</td>
						<td>
							<textarea cols=10 rows=5 id="feedback2" name="feedback2"></textarea> 
						</td>
					</tr>
				</table>
				<input type="submit" value="Submit"/> 
			</div>

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
			$('.single_upload_table').append('<tr id="dynamic"><td><textarea cols=10 rows=5 id=ques'+v1+' name=ques'+v1+'></textarea></td><td><input type="radio" id=radio'+v1+' name=radio'+v1+'/></td><td><textarea cols=10 rows=5 id=feedback'+v1+' name=feeback'+v1+'></textarea> </td></tr>');
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