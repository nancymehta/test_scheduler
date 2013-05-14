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
		<div class="midpanel">
		<div class="space"> </div>
 <div class="contact-strip  bg-light-pink fg-dark-orange"> 
 <?php
	if(isset($_SESSION['SESS_ERROR'])) {
		echo $_SESSION['SESS_ERROR'];
		unset($_SESSION['SESS_ERROR']);
	}
 ?>
 

     </div>
		
<div class="logindiv1">
<form action="<?php echo SITE_PATH .'main/login';?>" id = "login_form" name="login_form" method="post">
    <div class="login-strip bg-mid-gray">Login </div>
        <div class=" val">
            <label class="label1"><?php echo "UserName"; ?></label>
            <input id="username" name="user_name" type="text" />
            

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc" id="login_password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>

                    <div class"space"></div>
                        <br>
                           
              <input id="b1"  class="submmit_button_generic"  type="submit" value="Login"/>
                
              
         </div>

            
                <div class="para"></div>
     
</form>
</div>


        <div class="space"></div>
        <div class="space"></div>
        <div class="space"></div>
     
</div>
