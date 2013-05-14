<div class = "mainContainer">
		
			<div class = "header bg-vib-blue">
				<div class="logo"><img src="<?php echo IMAGE_PATH;?>/logo.png"></div><h1>testscheduler</h1>
				<div class = "sign-register">
						
				</div>
			
				<div class = "menu">
					<a href = "#" class=" button_generic margin-left-10" >Pricing</a>
						<a href = "<?php echo SITE_PATH."faq"; ?>" class=" button_generic margin-left-10">Faq's</a>
						<a href = "#" class=" button_generic margin-left-10">Blogs</a>
					 <a href = "#" class=" button_generic margin-left-10">Help</a>
           <a href = "#" class=" button_generic margin-left-10">Trial</a>
          
				</div>
			</div>
			
			
		<div class="space"> </div>
		<div class="space"> </div>
		<div class="space"> </div>
		<div class="space"> </div>
		<div class="midpanel">
		

		     <div class="contact-strip bg-light-pink fg-dark-orange"> 
		     <?php
				if(isset($_SESSION['SESS_ERROR'])) {
					echo $_SESSION['SESS_ERROR'];
					unset($_SESSION['SESS_ERROR']);
				}
			?>
 
</div>
<div id="registerdiv"  class="registerdiv1 ">

<form action="http://test_scheduler.com/main/register" id="register_form" name="register_form" method="post">
      

    <div class="login-strip bg-mid-gray ">Register</div>
            <div class=" val">
                <label class="label1"><?php echo "UserName" ?></label>
                <input id="username" name="username" class="loginc" type="text" />
                
               
                <label class="label1">
                <?php echo "Password" ?></label><br> <input id="password" name="password" type="password" class="loginc"/>
             
       




                <label class="label1"><?php echo "ConfirmPassword"; ?></label><br><input id="confirm_password" name="confirm_password" type="password"
			       	class="loginc" />

                <label class="label1"><?php echo "FirstName"; ?></label> <br> <input id="first_name" name="first_name" type=
                "text" class="loginc" />
               
                <label class="label1"><?php echo "LastName"; ?></label><br> <input id="last_name" name="last_name" type="text" class="loginc" />
    	                        
                <label class="label1"><?php echo "Email"; ?></label> <br><input id="email" name="email" type="text" class="loginc" />
                <label class="label1">Type of Organization</label> 
                <select class="select_generic floatl margin-left-10">
                <option selected="selected">Choose</option>
                <option>Institution</option>
                <option>Company</option>
                
                </select>
                   
               
                
                <div class="space"></div>
                
  <?php require_once(LIBRARY_ROOT.'/recaptcha/recaptchalib.php');
  $publickey = "6LeCCOESAAAAAFFBFDxunP2CQUD0vtAl3hzsaODy"; // you got this from the signup page
  echo recaptcha_get_html($publickey);  ?>
              <div class="space"></div>
 <input id="submit_registration"  type="submit" class="submmit_button_generic" onclick="abc()" value="<?php echo "SAVE"; ?>"  />
            

            </div>

            
      
        
       </form> 
        </div>


        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
     </div>
</div>
