<?php
/* @author 			:	Ashwani Singh
 * @created on 		:	07-05-2013
 * @description     :   Manage test random question selection
  ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 */
?>
<style>
.main {
	border-top: rgb(000,100,200);
	border: solid;
}

.content{
	float: left;
	width: 100%;
}
#cmcontent {
    height: auto !important;
    margin: 0 auto;
    min-height: 600px;
    padding: 0 20px;
    width: 100%;
}

.col640 {
    float: left;
    margin-right: 20px;
     width: 100%;
}
.hide {
	display: none;
}
.boldline {
	border-top: 2px solid #595959;
    padding-top: 18px;
}
.dotted {
	border-bottom: 1px dotted #D2D2D2;
    clear: both;
    color: #FFFFFF;
    float: none;
    height: 1px;
    margin: 5px 0 10px;
    padding: 0;
    width: 100%;
}
.clearheight {
	clear: both;
    height: 15px;
    width: auto;
}
.clearheight5 {
    clear: both;
    height: 5px;
    width: auto;
}
.clearheight30 {
    clear: both;
    height: 30px;
    width: auto;
}
.titlename {
	font-size: 1.1em;
    line-height: 1.3em;
}
.gray, .active {
    color: #4D4D4D;
}
h5 {
    clear: both;
    font-size: 1em;
    font-weight: bold;
    margin: 0;
    padding: 0;
}
h4 {
    font-size: 1.25em;
    font-weight: bold;
    margin: 0;
    padding: 0 0 12px;
}
ul#crumbtrail li {
    float: left;
    line-height: 1.8em;
    padding: 0 7px 0 0;
}
p, ul, a, label {
    list-style: none outside none;
    margin: 0 0 1.2em;
}
input {
    color: #000000;
    font-style: normal;
}
td.radio {
    padding-bottom: 12px;
    vertical-align: top;
    width: 20px;
}
td.inplab {
    vertical-align: top;
    width: 390px;
}
.userbox {
    border-bottom: 1px dotted #DDDDDD;
    margin: 0 0 12px;
    padding: 0 0 12px;
}


</style>

<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class="content">
<div id="col640">
		
  <div class="contact-strip bg-mid-gray">Manage Test</div>
	<div class="clearheight30"></div>
	<div id="random_question">

  <div class="contact-strip bg-mid-gray">Random Questions</div>
		<p>
			<a id="tog_random"  href="#" class="button_generic"> Set random questions</a>
		</p>	
		<div id="dotog_random" class="hide" >
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
	
			<h4>Option 1</h4>
			<p class="gray">
			Select the total number of questions randomly chosen from selected categories.
			<br>
			Questions will display in random order irrespective of their categories
			</p>
			<p>
			<a id="tog_randomopt1" class="showcont" href="#">View option 1 settings</a>
			<div class="dotted"></div>
			<form id="option1" name = "option1" class="randomQuestionsForm-old" method="post" action="#">
				<input type="hidden" value="option1" id="random_option1" name="random_option1">
				<input type="hidden" value="341354" id="test_id" name="test_id">
				<div id="dotog_randomopt1" class="hide">
					<div class="titlename">
					<label>Total number of questions </label><br>
					<input type="text" maxlength="3" size="3" value="" id="num_random" name="num_random">
					</div>
					<div class="clearheight"></div>
					
					<label>From categories:</label>
					<div class="clearheight"></div>	
					<table cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td class="radio">
									<input type="checkbox" value="0" id="cat_id_0" name="cat_id_0">
								</td>
								<td class="inplab">
									<label class="titlename" for="c1_0">Generic</label>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<div class="dotted"></div>
								</td>
							</tr>
						</tbody>
					</table>
					<input type="submit" value="Assign this test now" class="submmit_button_generic">
				</div>	
			</form>
			<div class="boldline"></div>	
			<div class="dotted"></div>
			<h4>Option 2</h4>
			<p class="gray">
				Select a specific number of questions per category to be randomly chosen.
				<br>
				Allows ordering and grouping questions by category.
			</p>
			<p>
			<a id="tog_randomopt2" class="showcont" href="#">View option 2 settings</a>
			</p>
			<div id="dotog_randomopt2" class="hide">
				<div class="dotted"></div>
				<div class="titlename">No. questions per category</div>
				<div class="clearheight"></div>
				<form id="option2" name = "option2" class="randomQuestionsForm-old" method="post" action="">
					<input type="hidden" value="option2" id="random_option2" name="random_option2">
					<input type="hidden" value="341354" id="test_id" name="test_id">
					<div class="userbox" >
						<div class="titlename">
							<input type="text" value="" id="cat_id_0" name="cat_id_0" size="2" maxlength="3">
								Generic
						</div>
					</div>			
					<div class="clearheight"></div>
					<h5>Random question ordering</h5>
					<p class="gray">
						Display random questions grouped and ordered by the category ordering above
					<br>
					</p>
					<table class="table-generic table1" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
							<td>
								<div class="titlename">
									<input id="rqo1" type="radio" checked="checked" value="0" name="rqo1">
									<label for="rqo1">Display questions in random order</label>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="clearheight5"></div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="titlename">
									<input id="rqo2" type="radio" value="1" name="rqo2">
									<label for="rqo2">Display questions grouped and ordered by categories above</label>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
					<input type="submit" value="Assign this test now" class="submmit_button_generic">
					<div class="clearheight30"></div>
				</form>
			</div>			
		</div>	
	</div>

	<div class="col-span-3">
		<div class="space"></div>
		<a id="tog_certs"  href="#" class="button_generic">click to use certificate</a>
	</div>
	<div class="clearheight5"></div>
	<div id="dotog_certs" class="hide" >
		<div class="col-span-3">
		<h5>Certificates</h5>
		<div class="clearheight"></div>
		<p class="gray">You can allow users to download a certificate when they complete their test.</p>
		<ol class="gray plain">
			<li>
				<a href="<?php echo SITE_PATH.'/testui/suraj'; ?>">Create a certificate</a>
			</li>
			<li>
				Now each time you
				<strong>Assign a test</strong>
				, you can select a certificate to be used.
			</li>
		</ol>
		<p class="explain">* Certificates are optional.</p>
	</div>
	<div class="col-span-2"> </div>
	<div class="col-span-4">
	<div class="clearheight30"></div>
</div>
</div>


</div>
<div class="midright">

<!-- right content goes here -->
</div> 
</div>
