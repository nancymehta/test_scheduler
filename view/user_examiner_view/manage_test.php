<?php
/* @author 			:	Ashwnai Singh
 * @created on 		:	07-05-2013
 * @description     :   Manage test random question selection
  ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 */
?>
<style>
#display a {
	text-decoration: none; 
	color: orange;
}
#display a:hover {
	text-decoration: underline; 
	color: orange;

}
a {
	text-decoration: none; 
	color: orange;
}	
a:hover {
	text-decoration: underline; 
	color: orange;

}

a.showcont {
    background: url("http://img.classmarker.com/a/showbtn.gif") no-repeat scroll right top transparent;
    clear: both;
    margin: 0;
    padding: 0 25px 5px 0;
}
</style>
<div id="display">
	<a href=# > Test  </a> > Manage Test 
</div>
<div id="test_name">
	[put test name here]
</div>

<div id="random_question">
	<h3>Random questions</h3>
	<p>
		<a id="tog_random" class="showcont" href="#">Set random questions</a>
	</p>
	<div id="dotog_random" class="hide" style="display: block;">
	<p class="gray">
		Random question settings are optional. Do not add
		<strong>Static questions</strong>
		to this test if you want all questions to be randomly chosen each time it is taken.
    </p>
	<p class="gray">
		As the questions selected for this test will change each time the test is taken,
		<strong>Total points available</strong>
		cannot be calculated in advance.
	</p>
	<p class="gray">
		<strong>Note:</strong>
		If you add questions to this test yourself manually (referred to as
		<strong>Static questions</strong>
		) they will not be used again when ClassMarker selects random questions from your question bank.
	</p>
	<p class="gray">Use either Option 1 or Option 2, not both.</p>
	<div class="clearheight5"></div>
	<h4>Option 1</h4>
	<p class="gray">
		Select the total number of questions randomly chosen from selected categories.
	<br>
		Questions will display in random order irrespective of their categories
	</p>
	<p>
	<a id="tog_randomopt1" class="showcont" href="#">View option 1 settings</a>
	<div class="titlename">
	<input type="text" maxlength="3" size="3" value="" name="num_random">
		Total number of questions
	</div>
	<div class="clearheight"></div>
	<div class="titlename">From categories:</div>
	<div class="clearheight"></div>
	</p>
</div>	
</div>
