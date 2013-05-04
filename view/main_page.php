<html>
	<head>
		<title>Test Scheduler</title>
		<link rel="stylesheet" type="text/css" href="../css/mainStyle.css">
		<script type="text/javascript" src = "../js/jquery-1.8.3.js"></script>
				
				<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		
	</head>
	
	<body>
		<div class = "mainContainer">
		
			<div class = "header">
				
				<div class = "sign-register">
					<ul>
						<li><a href = "#" id = "login" onclick = "showLogin()">Sign-in</a></li>
						<li><a href = "#" id = "register" onclick = "showRegister()">Register</a></li>
					</ul>
				</div>
			
				<div class = "menu">
					<ul>
						<li><a href = "#" style="color:black;">Pricing</a></li>
						<li><a href = "#">FAQ</a></li>
						<li><a href = "#">Blogs</a></li>
					</ul>
				</div>
				</div>
				
		
<div class="logindiv">


   <dd class="login1">
        <div class=" val">
            <label class="label1"><?php echo USER_NAME; ?><input id="user_name" name="user_name" type="text" /></label>

                    
                    <label class="label1"><?php echo PASSWORD; ?><input class="loginc" id="password" name="password" type="password"   />
                      </label>
                      <span class ="log_data"> </span>

                    <label class="label1" style="color:red"></label>
                                
              <input id="b1"  type="button" value=
                "Login"  onclick="checklogin()" />
                


                </span>
            </div>

            
                <div class="para"></div>
        </dd>


</div>

<div class="registerdiv">


        <dd class="register1">
            <div class=" val">
                <label class="label1"><?php echo USER_NAME; ?><input id="reg_user_name" type=
                "text" /></label>
                <span class ="user"> </span> 
               
                <label class="label1"><?php echo PASSWORD; ?><input id=
                "reg_password" type="password" onkeyup="check()" class="loginc"/>
             
       </label> 
       <span class ="reg_pass"> </span> 




                <label class="label1"><?php echo CONFIRM_PASSWORD; ?><input id="reg_confirm_password" type="password"
			class="loginc" /></label>
            <span class ="reg_conpass"> </span>

                <label class="label1"><?php echo FIRST_NAME; ?> <input id="reg_first_name" type=
                "text" /></label> 
                <span class ="reg_first"> </span>

                <label class="label1"><?php echo LAST_NAME; ?><input id="reg_last_name" type="text" /></label> 
                <span class ="reg_last"> </span>

                <label class="label1"><?php echo EMAIL; ?><input id="reg_email" type="text" /></label> 
                <span class ="reg_mail"> </span>

      <script>
$(function() {
    $( "#reg_dob" ).datepicker({
         dateFormat: 'mm/dd/yy',
           defaultDate: '-30yr',
           yearRange: 'c-25:c+15',
         changeMonth: true,
         changeYear: true,
         yearRange: '-110:-18',
             onClose: function(){
                 var today = new Date(), // today date object
                 birthday_val = $("#reg_dob").val().split('/'), // input value
                
                 birthday = new Date(birthday_val[2],birthday_val[0]-1,birthday_val[1]), // birthday date object
                 // calculate age
                 age = (today.getMonth() == birthday.getMonth() && today.getDate() > birthday.getDate()) ?
                       today.getFullYear() - birthday.getFullYear() : (today.getMonth() > birthday.getMonth()) ?
                             today.getFullYear() - birthday.getFullYear() :
                                   today.getFullYear() - birthday.getFullYear()-1;
       // alert(age);
                             $('#reg_age').val(age);
                   }
         });

            
     
         

     $( "#reg_dob,#reg_age" ).attr("readonly", "readonly");

    
     
});
</script>






               <label class="label1"><?php echo DOB; ?><input id="reg_dob"name="dob" type="text" /></label>
                <span class ="reg_date"> </span><br>

                 
                <label class="label1"><?php echo GENDER; ?>



            <select class="sel" id="reg_gender">
                    <option>
                       <?php echo MALE; ?>
                    </option>

                    <option>
                      <?php echo FEMALE; ?>
                    </option>
             </select>





            </label> <span class =""> </span><br>

                <label class="label1"><?php echo COUNTRY; ?>&nbsp;&nbsp;<select class="sel" id="reg_country">
                    <option>
                        India


                    

                    </option>

                    <option>
                        usa
                    </option>

                    <option>
                        uk
                    </option>

                    <option>
                        france
                    </option>
                </select></label> 



                 
                

                <div class="captcha" >

                <br><br><br>
<span style="float:right"> <img src="images/cap.php" >


                </span>


 </div>
 <br><br><br>
 <input id="b1" onclick="register()" type=
                "button" value="<?php echo SAVE; ?>" />
                
<br>

            </div>

            
                <div class="para"></div>
        </dd>
        
        
        </div>
				
		</div>
	</body>
</html>
<script>
$(document).ready(function(){
	  
	  $("#login").click(function(){
	    $(".logindiv").css("display","block");
	    $(".registerdiv").css("display","none");
		  
		  });

	  $("#register").click(function(){
		  $(".logindiv").css("display","none");
		   
			  $(".registerdiv").css("display","block");
		  

		   
	  });
});

</script>
