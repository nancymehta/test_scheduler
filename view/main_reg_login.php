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
				<div class="logo"><img src="<?php echo IMAGE_PATH;?>/logo.png"></div><h1>testscheduler</h1>
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
            <input id="username" name="user_name" type="text" class = "max-length" />
            

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc max-length" id="login_password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>
               <div class"space"></div>
                        <br>
                           
              <input id="b1"  class="submmit_button_generic"  type="submit" value="Login"/>
          <div class"space"></div><br>
         <a href="<?php echo SITE_PATH."forget_password"; ?>"  style="hover:color:red;" class="floatr fg-mid-blue"> Forget  Password ?</a>               
         </div>

            
                <div class="para"></div>
     
</form>

</div>
<div id="registerdiv" class="registerdiv logindiv">

<form action="http://test_scheduler.com/main/register" id="register_form" name="register_form" method="post">
      

    <div class="login-strip bg-mid-gray ">Register<span id="close1" class="close"> <img src="<?php echo IMAGE_PATH;?>/close.png"/></span></div>
            <div class=" val">
                <label class="label1"><?php echo "UserName" ?></label>
                <input id="username" name="username" class="loginc max-length" type="text" />
                
               
                <label class="label1">
                <?php echo "Password" ?></label><br> <input id="password" name="password" type="password" class="loginc max-length"/>
             
       




                <label class="label1"><?php echo "ConfirmPassword"; ?></label><br><input  id="confirm_password" name="confirm_password" type="password"
			       	class="loginc max-length" />

                <label class="label1"><?php echo "FirstName"; ?></label> <br> <input id="first_name" name="first_name" type=
                "text" class="loginc max-length" />
               
                <label class="label1"><?php echo "LastName"; ?></label><br> <input id="last_name" name="last_name" type="text" class="loginc max-length" />
    	                        
                <label class="label1"><?php echo "Email"; ?></label> <br><input id="email" name="email" type="text" class="loginc max-length" />
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
				