<?php 
/* @author 		 :Shashank Verma
 * @created on   :07-05-2013
 * @desc		 :Create Main header of login and register 
 ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 ************************************************************	
 *
*/
?>

		<div class = "mainContainer">
		
			<div class = "header">
				<div class="logo"><img src="<?php echo IMAGE_PATH;?>/logo.png"></div><h1><font style="color:black">test</font>scheduler</h1>
				<div class = "sign-register">
					<ul>
						<li><a href = "#" id = "login" >Sign-in</a></li>
						<li><a href = "#" id = "register" >Register</a></li>
					</ul>
				</div>
			
				<div class = "menu">
					<ul>
						<li><a href = "#" style="color:black;">Pricing</a></li>
						<li><a href = "#">Faq's</a></li>
						<li><a href = "#">Blogs</a></li>
					</ul>
				</div>
			</div>
		
		
<div id="logindiv" class="logindiv">
    <div class="login-strip">Login <span id="close" class="close"> X</span></div>
        <div class=" val">
            <label class="label1"><?php echo "UserName"; ?></label><input id="user_name" name="user_name" type="text" />

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc" id="password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>

                    
                           
              <input id="b1"  type="button" value=
                "Login"  onclick="checklogin()" />
                


                
            </div>

            
                <div class="para"></div>
     

</div>
<div id="registerdiv" class="registerdiv">


        <dd class="register1">

    <div class="login-strip">Register<span id="close1" class="close"> X</span></div>
            <div class=" val">
                <label class="label1"><?php echo "UserName" ?><input id="reg_user_name" class="loginc" type=
                "text" /></label>
               
                <label class="label1"><?php echo "Password" ?><input id=
                "reg_password" type="password" onkeyup="check()" class="loginc"/>
             
       </label> 




                <label class="label1"><?php echo "ConfirmPassword"; ?><input id="reg_confirm_password" type="password"
			class="loginc" /></label>

                <label class="label1"><?php echo "FirstName"; ?> <input id="reg_first_name" type=
                "text" class="loginc" /></label> 
               
                <label class="label1"><?php echo "LastName"; ?><input id="reg_last_name" type="text" class="loginc" /></label> 
                

                <label class="label1"><?php echo "Email"; ?><input id="reg_email" type="text"  class="loginc" /></label> 
              

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






               <label class="label1"><?php echo "DOB";?><input id="reg_dob" name="dob" class="loginc" type="text" /></label>
                <span class ="reg_date"> </span><br>

                 
                <label class="label1"><?php echo "Gender"; ?>



            <select class="sel" id="reg_gender">
                    <option>
                       <?php echo "MALE"; ?>
                    </option>

                    <option>
                      <?php echo "FEMALE"; ?>
                    </option>
             </select>





            </label> <span class =""> </span><br>

                <label class="label1"><?php echo "Country"; ?>&nbsp;&nbsp;<select class="sel" id="reg_country">
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
                "button" value="<?php echo "SAVE"; ?>" />
                
<br>

            </div>

            
                <div class="para"></div>
        </dd>
        
        
        </div>
				
        <div class="para"></div>