<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#divView1").hide();
	    $("#divView2").hide();
	    $("#divView3").hide();
	    $("#divView4").hide();
		$("#view1").click(function(){
  			$("#divView1").toggle();
		});
		
		$("#view2").click(function(){
  			$("#divView2").toggle();
		});
		$("#view3").click(function(){
  			$("#divView3").toggle();
		});
		$("#view4").click(function(){
  			$("#divView4").toggle();
		});
		
	});

</script>
<style>
.bigmid{
	
  	height: 75%;
  	width: 60%;
	
  }
</style>
<div  class="bigmid">
	<h4>View and edit my details:</h4>
	<a id="view1" href="#" > View</a>
	<div id="divView1">
	<table>
		<tr><td>Name: </td> <td> Your Name</td></tr>
		<tr><td>User Name: </td> <td> Your User Name</td></tr>
		<tr><td>Password: </td> <td> Your Password</td></tr>
		<tr><td>Email: </td> <td> Your Email</td></tr>
		<tr><td>Email Status: </td> <td> Verified / Not Verified</td></tr>
		<tr><td>Country: </td> <td>  Your Country</td></tr>
		<tr><td>Display Name: </td> <td> display your first name</td></tr>
	</table>
	<input type="submit" value="Edit my details"/>
	</div>
    <hr>
    <h4>Registered users under my account:</h4>
    <a href="#" id="view2">View</a>
    <div id="divView2">
    <p>
    You currently have 1000 user places available to use.

	All accounts can have up to 1000 users registered at once under their Registered user groups.

	You can add, edit or delete users at any time under the Users section within your Registered user groups.</p>
	 <p>You may also have unused user places (registration codes) under your Registered user groups which can be deleted to make room for more user places in your groups. 
	 You can delete non-active registered users to free up available user places.

	<p><b>Note:</b> Direct link testing allows for testing of an unlimited number of users based on your available test credits (see above: Account plans & usage).
    </p>
    </div>
    <hr>
    <h4>Verify extra email addresses:</h4>
    <a href="#" id="view3">View</a>
    <div id="divView3">
    <p>
    
	You can use alternate email addresses to have your Direct link test results sent to. Choose which email to use for each group via the Assign section when assigning a test or editing settings.

	Only upgraded accounts can add new email addresses.
    </p>
    </div>
    <hr>
    <h4>Close account:</h4>
    <a href="#" id="view4">View</a>
    <div id="divView4">
    <p>You can close your ClassMarker account at any time and all your data will be removed from our database.
     You must verify your login user name and password to close your account.</p>
     <p><b>Note:</b> Closing your account is permanent and cannot be undone.</p><br/>
     <b>Reasons for closing your Account?</b><br/>
     <form>
     <textarea cols="30" rows="3" name="reason" id="reason"></textarea><br/>
     <table>
	 <tr><td>User Name: </td><td><input type="text" name="userName" id="userName"/></td></tr>
	 
	 <tr><td>Password: </td><td><input type="password" name="userPassword" id="userPassword"/></td></tr>
	 </table>
	 <br/><p><b>Note:</b> Please be patient once you select the link below. 
	Closing your account can take a few moments.</p>
	<input type="submit" value="Permanently close my account"/>
     </form>
    </div>
</div>