<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->
<form action="<?php echo SITE_PATH;?>questionBank/bulkUploadController" method="post" enctype="multipart/form-data">
		<div  class="contact-strip bg-mid-gray">BulkUpload:</div>

		<div class="space"></div>
		<input type="file" name="file" id="file" class="button_generic floatr">
		<div class="space"></div>
		
		<input type="submit" name="submit" value="Submit" class="submmit_button_generic font-generic-mid">
	</form>
</div>
<div class="midright">

<!-- right content goes here -->
<span class="bulk_error_span">
				<label>Errors Log:</label><br/>
			<?php
				//print_r($arrData);
				if($arrData) {
					if(is_array($arrData)) {
						echo "<ul>";
						foreach($arrData as $key) {
							if(substr_count($key,"cannot upload")<1) {
								echo "<li class='colorblue'>" .$key ." </li>";
							} else {
								echo "<li>" .$key ." </li>";
							}
						}
						echo "</ul>";						
					} else {
						echo $arrData;
					}
					
				}
				 
			?>				
			</span>
</div>

</div>



	
	
			
	


