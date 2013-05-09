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
						<li><a href = "<?php echo SITE_PATH."faq"; ?>">Faq's</a></li>
						<li><a href = "#">Blogs</a></li>
					</ul>
				</div>
			</div>
		
		
<div id="logindiv" class="logindiv">
<form action="<?php echo SITE_PATH .'main/login';?>" name="login_form" method="post">
    <div class="login-strip">Login <span id="bclose" class="close">X</span></div>
        <div class=" val">
            <label class="label1"><?php echo "UserName"; ?></label>
            <input id="username" name="user_name" type="text" />
            

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc" id="password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>

                    
                           
              <input id="b1"  type="submit" value="Login" />
                
              
         </div>

            
                <div class="para"></div>
     
</form>
</div>
<div id="registerdiv" class="registerdiv">

<form action="http://test_scheduler.com/main/register" id="register_form" name="register_form" method="post">
        <dd class="register1">

    <div class="login-strip">Register<span id="close1" class="close"> X</span></div>
            <div class=" val">
                <label class="label1"><?php echo "UserName" ?>
                <input id="username" name="username" class="loginc" type="text" /></label>
                
               
                <label class="label1">
                <?php echo "Password" ?><input id="password" name="password" type="password" class="loginc"/>
             
       </label> 




                <label class="label1"><?php echo "ConfirmPassword"; ?><input id="reg_confirm_password" name="password" type="password"
			class="loginc" /></label>

                <label class="label1"><?php echo "FirstName"; ?> <input id="reg_first_name" name="first_name" type=
                "text" class="loginc" /></label> 
               
                <label class="label1"><?php echo "LastName"; ?><input id="reg_last_name" name="last_name" type="text" class="loginc" /></label> 
                

                <label class="label1"><?php echo "Email"; ?><input id="reg_email" name="email" type="text"  class="loginc" /></label> 
               
       
               
                

                <div class="captcha" >

              
</div>
 <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php require_once(LIBRARY_ROOT.'/recaptcha/recaptchalib.php');
  $publickey = "6LeCCOESAAAAAFFBFDxunP2CQUD0vtAl3hzsaODy"; // you got this from the signup page
  echo recaptcha_get_html($publickey);  ?>
 <input id="submit_registration"  type="submit" value="<?php echo "SAVE"; ?>" />
                
<br>

            </div>

            
                <div class="para"></div>
        </dd>
        
       </form> 
        </div>
				
        <div class="para"></div>
