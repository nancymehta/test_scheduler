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
	
  	height: auto;
  	width: 30%;
  	float: right;
  	
  
  	
  }
  .midpanel_content
  {
  	height: auto;
  	width:	100%;
  	float: left;
  	padding-left:5px;
  	
  	margin-top: 30px;
  }
  .result_by_test_header
  {
  	background-color: black;
  	height:10%;
  	color: white;
  	padding-top: 25px;
  	padding-left:20px;
  	font-size: 2em;
  	
  }
  select
  {
  	width: 400px;
  }
  
</style>

<div class="bigmid">
	<div class="result_by_test_header"><b>Overall Test Results</b></div>
	<div class="midpanel">
		<div class="midpanel_content">
		    <b>Filter tests by category:</b></br>
		    <select >
		    	<option selected="selected">Show all test</option>
		    	<option>Generic test</option>
		    </select><br/><br/>
		    <table cellpadding="2" border="1">
		    	<tr><th colspan="4">Overall Results</th><td>Percentage</td><td>Scores</td><td>Duration</td><td>Attempts</td></tr>
		    	<tr><td colspan="4">Demo</td><td>--</td><td>--</td><td>--</td><td>--</td></tr>
		    	<tr><td colspan="4">Dummy</td><td>--</td><td>--</td><td>--</td><td>--</td></tr>
		    	<tr><td colspan="4">Dummy</td><td>--</td><td>--</td><td>--</td><td>--</td></tr>
		    	<tr><td colspan="4">Dummy</td><td>--</td><td>--</td><td>--</td><td>--</td></tr>
		    </table>
		    
		</div>


	</div>
	<div class="midright">
		<b>About test results</b>
		<hr>
		Results on this page are calculated as an average from your Registered user groups and Direct link testing combined.<br/><br/>
		Tests that are currently <b>In progress</b> are not included.<br/><br/>
		
		<b>Note:</b> Results on this page are updated every <b>10 minutes.</b> Recent results may not appear.
		<hr>
		<b>Display options</b>
		<hr>
		<a href="">Order First to Last</a>
		<hr>
		<form>
		<b>Export Results</b><hr>
		Export these results to tab separated Excel(TM) format.<br/>
		<input type="submit" value="Export results"/><hr>
		</form>	
		
	</div>

</div>