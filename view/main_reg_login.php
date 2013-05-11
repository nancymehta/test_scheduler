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
 * 
*/
?>

		<div class = "mainContainer">
		
			<div class = "header bg-vib-blue">
				<div class="logo"><img src="<?php echo IMAGE_PATH;?>/logo.png"></div><h1><font class="fg-dark-orange">test</font>scheduler</h1>
				<div class = "sign-register">
			
				<a href = "#" id = "login"  class=" button_generic margin-left-10 ">Sign-in</a>
				<a href = "#" id = "register"  class=" button_generic margin-left-10"  >Register</a>
				
				</div>
			
				<div class = "menu">
					<a href = "#" class=" button_generic margin-left-10" >Pricing</a>
						<a href = "<?php echo SITE_PATH."faq"; ?>" class=" button_generic margin-left-10">Faq's</a>
						<a href = "#" class=" button_generic margin-left-10">Blogs</a>
					 <a href = "#" class=" button_generic margin-left-10">Help</a>
           <a href = "#" class=" button_generic margin-left-10">Trial</a>
          
				</div>
			</div>
		
		
<div id="logindiv" class="logindiv">
<form action="<?php echo SITE_PATH .'main/login';?>" id = "login_form" name="login_form" method="post">
    <div class="login-strip bg-mid-gray">Login <span id="bclose" class="close"><img src="<?php echo IMAGE_PATH;?>/close.png"/></span></div>
        <div class=" val">
            <label class="label1"><?php echo "UserName"; ?></label>
            <input id="username" name="user_name" type="text" />
            

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc" id="login_password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>

                    
                           
              <input id="b1"  type="submit" value="Login" />
                
              
         </div>

            
                <div class="para"></div>
     
</form>
</div>
<div id="registerdiv" class="registerdiv logindiv">

<form action="http://test_scheduler.com/main/register" id="register_form" name="register_form" method="post">
      

    <div class="login-strip bg-mid-gray ">Register<span id="close1" class="close"> <img src="<?php echo IMAGE_PATH;?>/close.png"/></span></div>
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
    	           
   
               
                <br>
                <br>
                <br>
  <?php require_once(LIBRARY_ROOT.'/recaptcha/recaptchalib.php');
  $publickey = "6LeCCOESAAAAAFFBFDxunP2CQUD0vtAl3hzsaODy"; // you got this from the signup page
  echo recaptcha_get_html($publickey);  ?>
              
 <input id="submit_registration"  type="submit" class="bg-vib-blue " onclick="abc()" value="<?php echo "SAVE"; ?>" />
            

            </div>

            
      
        
       </form> 
        </div>
				