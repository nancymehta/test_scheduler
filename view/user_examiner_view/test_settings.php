<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<h3>Test Settings</h3>
<form name="testSettings"  id="testSettings" action="" >
<div >
	<div>
		<div id="userTestSettingLeft">
			<div class="testSettingCommonHeight1">
				Test Name: PHP CODE HERE...
			</div>
		</div>
		<div id="userTestSettingRight">
			<div class="testSettingCommonHeight2">
				Instructions<br/>
				Some instructions here..
			</div>
		</div>
	</div>
	
	<div>
		<div id="userTestSettingLeft">
			<div class="testSettingCommonHeight2">
				Direct Link :<input type="textbox" id="directLink" name="directLink" />
			</div>
			
		</div>
		<div id="userTestSettingRight">
			<div class="testSettingCommonHeight2">
				Instructions<br/>
				Some instructions here..
			</div>
		</div>
	</div>
	
	<div>
		<div id="userTestSettingLeft">
			<h3>Group Preferences</h3>
			<div class="testSettingCommonHeight2">
				<h4>Saving And Email Preferences.</h4>
				You can choose to save results, and also which items (Name, Email and
				more) you wish to save for each user who takes the test in this group.
				<br/><br/>
				<input type="checkbox" name="saveTestResultCheckbox" 
				id="saveTestResultCheckbox" checked value="1" />Save User Test Results.
			</div>
		</div>
		<div id="userTestSettingRight">
			<div class="testSettingCommonHeight2">
				<br/>About saving results.<br/>
				<h4>Saving user test results:</h4>
				No advertising will display and 1 credit is deducted per test taken.
				<hr/>
				<h4>Not saving user test results:</h4>
				The test can still be taken.
				Advertising and "Powered by
				ClassMarker" logo will display.
				Any assigned Certificates and
				Return links will not be available.
				Credits will not be deducted.
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					Email Results To Me.<br/>
					<input type="radio" name="emailResults" id="emailResults" value="0" />Off
					<hr/>
					<input type="radio" name="emailResults" value="1"
					id="emailResults" />Email Score Only.<br/>
					<input type="radio" name="emailResults" value="2"
					id="emailResults" />Email Score, and incorrectly answered Questions only.<br/>
					<input type="radio" name="emailResults" value="3"
					 id="emailResults" />Email Score, and all answered questions.<br/>
					 <br/>
					 <b>Choose email address to send results to:</b>
					You first need to verify your email address via the <b>My account</b> section before 
					it can be selected here.


				</div>
				
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<b>Note:</b> To have results emailed to you, you must also select to save
					results. This way you can also review your users results and statistics in ClassMarker.
					<br/>
					<b>Add Extra Email Addressess:</b>
					You can add new email addresses to send results to via the My account section.
					<ol>
						<li>Complete your test settings below and select Continue to save all changes. </li>
						<li>Go to the My Account section to add and verify the new email address. </li>
						<li>Then go back to <b>Assign /View assigned tests and settings</b>.
						Find the group the test has been assigned to and expand the view,
						<b> then select Settings: Edit</b>.</li>
						<li>Scroll down the page to the <b>Saving and email preferences</b> and select the
						new email address and select <b>Submit & Review</b> at the bottom of the page. </li>
					</ol>
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h4>Collect User Information</h4>
					The next 3 options below, if selected, will be mandatory for your users to 
					fill in before they can take your test.<br/>
					<input type="checkbox" name="userInformation[]" id="userInformation[]" value="1" />First Name<br/>
					<input type="checkbox" name="userInformation[]" id="userInformation[]" value="2" />Last Name<br/>
					<input type="checkbox" name="userInformation[]" id="userInformation[]" value="3" />Email Address<br/>

				</div>
				
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2"><br/>
					<b>Note:</b> You must choose to <b>Save results</b> to have User information saved.
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h4>Test availability</h4>
					<h4>Option1</h4>
					<input type="radio" name="testAvailability" id="testAvailability" value="1" />
					Available - Test will show and be available to take.<br/>
					<input type="radio" name="testAvailability" id="testAvailability" value="2" />
					Unavailable - Test will not show or be available to take.<br/>
					<sup>*</sup> Both date fields must be filled in if dates are used.<br/><br/>
					Your time zone: (GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi Ensure your time zone is correct
					before setting available dates. Edit your time zone via the My account section.<br/><br/>
					Format &emsp; mm/dd/yyyy<br/><br/>
					Show From: <input type="text" name="showFromDate" id="showFromDate" /><br/>
					Show From: <input type="text" name="showUntilDate" id="showUntilDate" />

				</div>
				
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/><br/>
					<b>Option 1:</b>Choose if users can see the test or not.<br/><br/>
					<b>Option 2:</b>Set a window of availability. The test will not be available outside
					 of your given dates.
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Choose what users will see after completion.</h3>
					<input type="radio" name="afterCompletion" id="afterCompletion" value="1" />No score, questions or feedback.<br/>
					<input type="radio" name="afterCompletion" id="afterCompletion" value="2" />Score only. <br/>
					<input type="radio" name="afterCompletion" id="afterCompletion" value="3" />Score, questions and chosen answers.<br/>
					<input type="radio" name="afterCompletion" id="afterCompletion" value="4" />Score, questions, chosen answers and show correct answers.<br/>
					<br/><br/>
					If showing chosen answers in results<br/>
					<input type="radio" name="showAnswers" id="showAnswers" value="1" />Display all questions.<br/>
					<input type="radio" name="showAnswers" id="showAnswers" value="2" />Display incorrect questions only.
				</div>
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/><br/><br/>Certificates will display with either setting if set to show below.
					<br/><br/><br/><br/><br/>Show all or only incorrectly answered questions in test results.

				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Give questions in random order .</h3>
					<input type="radio" id="questionsOrder" name="questionsOrder" value="1" /> Off &emsp;
					<input type="radio" id="questionsOrder" name="questionsOrder" value="2" />On
				</div>
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/>
					Randomize questions each time test is taken for test integrity.
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Number of questions to be displayed per page.</h3>
					<input type="text" name="questionsPerPage" id="questionsPerPage" value="1" />Questions Per Page
				</div>
			</div>
			
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Save and Finish Later Mode.</h3>
					Allow users to save this test, come back and finish it at another time.
					If set to 'Off', test must be finished in one sitting.<br/>
					<input type="radio" id="finishLater" name="finishLater" value="1" selected /> Off &emsp;
					<input type="radio" id="finishLater" name="finishLater" value="2" />On
					
				</div>
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/>Users will be required to add an email address and choose their
					own password to allow them to log back in and finish the test at a
					later date if they require.<br/><br/> Only available when saving results(set above).
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Allow users to go back during test.</h3>
					When turned on, users can go back to previous questions to change their answers during the test.<br/>
					<input type="radio" id="allowBack" name="allowBack" value="1" /> Off &emsp;
					<input type="radio" id="allowBack" name="allowBack" value="2" />On
					
				</div>
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/><b>Note:</b> If Show feedback during test or Show feedback during
					test and show correct answers (setting above) is enabled users
					will automatically be restricted from going back to change answers.
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Must select an answer.</h3>
					When turned on, users must answer every question to complete the test.<br/>
					When turned off, any unanswered questions will be shown as incorrect.<br/>
					<input type="radio" id="mustSelect" name="mustSelect" value="1" /> Off &emsp;
					<input type="radio" id="mustSelect" name="mustSelect" value="2" />On
					
				</div>
			</div>
			<div id="userTestSettingRight">
				<div class="testSettingCommonHeight2">
					<br/><b>Note:</b> If Show feedback during test or Show feedback during
					test and show correct answers (setting above) is enabled users
					will automatically be restricted from going back to change answers.
				</div>
			</div>
		</div>
		<div>
			<div id="userTestSettingLeft">
				<div class="testSettingCommonHeight2">
					<h3>Show 'Brief test settings' before each test starts.</h3>
					When turned on, users will see a brief list of instructions based on your chosen settings above.<br/>
					<h5>Example</h5>
					<hr/>
					This test:
					<ul>
						<li>Will allow you to save and finish at a later date.</li>
						<li>Has a time limit of 20 minutes.</li>
						<li>Will not allow you to go back and change your answers.</li>
						<li>Will finish if you get any questions incorrect.</li>
						<li>Has a pass mark of 70%.</li>
					</ul>
					<hr/>
					<input type="radio" id="instructions" name="instructions" value="1" /> Off &emsp;
					<input type="radio" id="instructions" name="instructions" value="2" />On
					
				</div>
			</div>
		</div>
		<input type="submit" value="Submit" name="testSettingSubmit" id="testSettingSubmit" />
	</div>
	
</div>

</form>

</div>

</div>