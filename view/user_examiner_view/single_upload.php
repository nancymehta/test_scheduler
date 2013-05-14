<div class="space"></div><div class="space"></div>
  <div class="contact-strip bg-mid-gray"> Question Bank</div>
<div class="bigmid">
	<div class="midpanel">

		<!-- midpanel Content gooes here  -->
<?php //print_r($arrData)?>

			<a class="button_generic"
			href="<?php echo SITE_PATH."testui/bulk_upload"; ?>">Add More
			Questions</a>
		<div class="space"></div>

		<form
			action="<?php echo SITE_PATH .'questionBank/singleUploadController';?>"
			name="login_form" method="post">
			<br>
			<div class="single_upload_main">
				<a href="<?php echo SITE_PATH ?>user/viewAllQuestion">Show question
					Category wise</a> <br>
				<div class="innerdiv">
					<label> Question type: </label> <select class="select_generic">
						<option value="0">mcq</option>
						<option value="1">true/false</option>

					</select>
				</div>
				<br>
				<div class="innerdiv">
					<div class="space"></div>
					<label> Category: </label> <select class="select_generic">
						<!--<option value="0">PHP</option>
					<option value="1">MYSQL</option> 
				-->
				<?php
				if(isset($arrData)){
					
				}else{
					$arrData=NULL;
				}
				if (isset ( $arrData )) {
					$i = 0;
					while ( (!empty ( $arrData ['category_name'] [$i] )) ) {
						echo "<option>";
						echo ($arrData ['category_name'] [$i]);
						echo "</option>";
						$i ++;
					}
				} else {
					echo "<option>no test category</option>";
				}
				?>
					
				</select>
				</div>


				<div class="space"></div>
				<div class="innerdiv">
					<div class="space"></div>
					<label>Type Qestion here:</label><input class="text_right_generic" type="textarea" name="question" id="question">
				</div>
				<div class="space"></div>
				<div class="space"></div>
			<a class="button_generic" href="#" id="addOptions">Click to add option</a>
				<div class="space"></div>
				
				<div class="innerdiv innerdiv1">
					<div class="contact-strip bg-mid-gray">Add Options Here</div>


					<div class="space"></div>
					<input type="button" id="addButton" class="button_generic"
						value="Add Options" /> <input type="button" id="removeButton"
						class="button_generic" value="Delete Options" />
					<div class="space"></div>

					<div class="space"></div>


					<table class="s_upload_table table-generic font-generic-mid">
						<thead>
							<tr>
								<th>Options</th>
								<th>Answer</th>
								<th>Feedback</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<div class="test"></div> <textarea cols=15 rows=1 id="ques1"
										name="ques1" class="text_right_generic "></textarea>
								</td>
								<td><input type="checkbox" id="check1" name="check1"></td>
								<td><textarea cols=15 rows=1 id="feedback1" name="feedback1"
										class="text_right_generic"></textarea></td>
							</tr>
							<tr>
								<td><textarea cols=15 rows=1 id="ques2" name="ques2"
										class="text_right_generic"></textarea></td>
								<td><input type="checkbox" id="check2" name="check2"></td>
								<td><textarea cols=15 rows=1 id="feedback2" name="feedback2"
										class="text_right_generic"></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="space"></div>

				<div class="space"></div>

			</div>
			<input type="submit" name='submit' value="Submit"
				class="submmit_button_generic font-generic-mid" />
		</form>



	</div>
	<div class="midright">

		<!-- right content goes here -->
	</div>

</div>




