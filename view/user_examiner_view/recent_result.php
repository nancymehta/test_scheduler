<style>
.bigmid{
	
  	height: 75%;
  	width: auto;
	border:1px solid red;
  }
  .midpanel{
	
  	height: 75%;
  	width: 50%;
  	float:left;
  	
  	
  } 
  .midright{
	
  	height: 75%;
  	width: 30%;
  	float: right;
  	padding-top: 5px;
  	
  
  	
  }
  .midpanel_content
  {
  	height: auto;
  	width:	80%;
  	float: right;
  	
  	margin-top: 30px;
  }
.recent_result_header
  {
  	background-color: black;
  	height:10%;
  	color: white;
  	padding-top: 25px;
  	padding-left:20px;
  	font-size: 2em;
  	
  }
  
</style>

<div class="bigmid">
	<div class="recent_result_header"><b>Recent Test Results</b></div>
	<div class="midpanel">
		<div class="midpanel_content">
		    <b>No Recent Results</b>
		    <hr>
		    This page will display recent test results.
		</div>


	</div>
	<div class="midright">
	
		<form action="" method="">
			User search
			<hr>
			Fill one or more fields</br>
			<table>
				<tr cellspacing="2">First Name</tr></br>
				<tr><input type="text" name="first_name" id="first_name"/></tr></br>
				<tr>Last Name</tr></br>
				<tr><input type="text" name="last_name" id="last_name"/></tr></br>
				<tr>Email Address</tr></br>
				<tr><input type="text" name="email" id="email"/></tr></br>
				<tr><input type="submit" value="Search"/></tr>
			</table>
		</form>
	</div>

</div>