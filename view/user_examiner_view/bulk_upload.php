
	<title>bulkupload</title>
	<style type="text/css">
		.bulkupload{

		}
		.bulk_error{
			width: 500px;
			height: 300px;
			border: solid 1px;
			float: left; 
			
		}
		.bulk_error_span{
			height:200px; 
			width:500px;
		}
	</style>
</head>
<body>
	<div class="">
	<form action="<?php echo SITE_PATH;?>questionBank/bulkUploadController" method="post" enctype="multipart/form-data">
		<label for="file">BulkUpload:</label>
		<input type="file" name="file" id="file"><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<hr>
		<div class="">
			<span class="bulk_error_span">
				<label>Errors Log:</label><br/>
			</span>
			<div class="bulk_error">

			</div>
			
		</div>
	</div>


