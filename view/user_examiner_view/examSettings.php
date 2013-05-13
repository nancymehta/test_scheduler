<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<?php //echo '<pre>';var_dump($arrData);?>
EXAM SETTINGS
<form action="http://test_scheduler.com/createTest/testSettings" method="post">
<table>
<tr>
<td>Random</td>
<td><input type="radio"  <?php if(isset($arrData['random'])){if($arrData['random']=='0') echo 'checked';}?> name="random" value="yes">yes <input type="radio"  <?php if(isset($arrData['random'])){if($arrData['random']=='1') echo 'checked';}?> name="random" value="no">no</td>
</tr>
<!--  insert category here with no of questions here-->

<tr>
<td>Start Time</td>
<td><input type="text" value="<?php if(isset($arrData['start_time'])){echo $arrData['start_time'];}?>" name="startTime" id="startTime">
</tr>

<tr>
<td>End Time</td>
<td><input type="text" value="<?php if(isset($arrData['end_time'])){echo $arrData['end_time'];}?>" name="endTime" id="endTime">
</tr>

<tr>
<td>Test Duration (mins)</td>
<td><input type="text" value="<?php if(isset($arrData['time_limit'])){echo $arrData['time_limit'];}?>" name="timeDuration" id="timeDuration">
</tr>

<tr>
<td>Per Page Questions</td>
<td><input type="text" value="<?php if(isset($arrData['per_page_ques'])){echo $arrData['per_page_ques'];}?>" name="perPageQuestions" id="perPageQuestions">
</tr>

<tr>
<td>Passing Marks</td>
<td><input type="text"  value="<?php if(isset($arrData['pass_marks'])){echo $arrData['pass_marks'];}?>" name="passingMarks" id="passingMarks">
</tr>

<tr>
<td>Feedback</td>
<td><input type="radio"  <?php if(isset($arrData['feedback'])){if($arrData['feedback']=='0') echo 'checked';}?> name="feedback" value="yes">yes <input type="radio" <?php if(isset($arrData['feedback'])){if($arrData['feedback']=='1') echo 'checked';}?> name="feedback" value="no">no</td>
</tr>

<tr>
<td>Email Score</td>
<td><input type="radio" <?php if(isset($arrData['email_results'])){if($arrData['email_results']=='0') echo 'checked';}?> name="emailScore" value="yes">yes <input type="radio" <?php if(isset($arrData['email_results'])){if($arrData['email_results']=='1') echo 'checked';}?> name="emailScore" value="no">no</td>
</tr>

<!--  no of attempts -->

<input type="hidden" name="testId" id="testId" value="<?php if(isset($_REQUEST['test_id'])) {echo $_REQUEST['test_id'];}?>">
<tr>
<td>
<input type="submit" value="submit">
</td>
</table>
</form>

</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>