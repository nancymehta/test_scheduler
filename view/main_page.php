
<html>
	<head>
		<title>Test Scheduler</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>/mainStyle.css">
		<script type="text/javascript" src = "<?php echo JS_PATH;?>jquery-1.8.3.js"></script>
   <script type="text/javascript" src ="<?php echo JS_PATH;?>jScript.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
		
	</head>
	
	<body>
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
		
			<div  class = "mainSlider">
				<div class = "imgSlider">
				
            <div class="home">
                <div class="slidertopdiv">

                <p>
                </div>
                <div id="slidercontainer1">
                    <div id="slider1"><img alt=""  src=
                    "<?php echo IMAGE_PATH;?>e4.jpg" /> <img alt=""  src=
                    "<?php echo IMAGE_PATH;?>e1.jpg" /> <img alt=""  src=
                    "<?php echo IMAGE_PATH;?>e2.jpg" /> <img alt="" src=
                    "<?php echo IMAGE_PATH;?>e3.jpg" /> <img alt=""  src=
                    "<?php echo IMAGE_PATH;?>e5.jpg" /> <img alt="" src=
                    "<?php echo IMAGE_PATH;?>e7.jpg" /> <img alt=""  src=
                    "<?php echo IMAGE_PATH;?>e6.jpg" /></div>
                </div>

            </div>
        
				</div>
				<div class = "videoSlider">
				<iframe  src="http://www.youtube.com/embed/L0pjVcIsU6A" 
        frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			
        <div class="para"></div>
    <div class="contact-strip">Our Services / clients / Toppers</div>
			<div  class = "info">
				<div class = "service">

             <div  class="main-container-parent-move">


        <div  class="main-container-move">
          
          <div class="inner-container-move">
            <img src="<?php echo IMAGE_PATH;?>c1.png">
            <img src="<?php echo IMAGE_PATH;?>c2.jpg">
            <img src="<?php echo IMAGE_PATH;?>c3.gif">
            <img src="<?php echo IMAGE_PATH;?>c4.jpg">
            <img src="<?php echo IMAGE_PATH;?>c5.jpg">
            <img src="<?php echo IMAGE_PATH;?>c6.gif">
          
          </div>

        <input type="button" value="&#60;"  class="back">

        <input type="button" value="&#62;" class="next">
        </div>

        </div>
				
				</div>

				<div class = "client">
				<div class="inner-container-partner">
            <img src="<?php echo IMAGE_PATH;?>p2.jpg">

            <img src="<?php echo IMAGE_PATH;?>p1.png">
            <h1>Our Partners</h1>
           </div>

         
            
       


				</div>
				<div class = "Toppers">
				
				</div>
			</div>
				
		
<div class="logindiv">
    <div class="login-strip">Login <span id="close" class="close"> X</span></div>
        <div class=" val">
            <label class="label1"><?php echo "UserName"; ?></label></label><input id="user_name" name="user_name" type="text" />

                    
                    <label class="label1"><?php echo "Password"; ?>  </label><input class="loginc" id="password" name="password" type="password"   />
                    
                      <span class ="log_data"> </span>

                    
                           
              <input id="b1"  type="button" value=
                "Login"  onclick="checklogin()" />
                


                </span>
            </div>

            
                <div class="para"></div>
     

</div>

<div class="registerdiv">


        <dd class="register1">

    <div class="login-strip">Register</div>
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






               <label class="label1"><?php echo "DOB"; ?><input id="reg_dob"name="dob" class="loginc" type="text" /></label>
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
				
    <div class="contact-strip">Contact Us</div>
            <div class=" val">
        
                <label class="label1"><?php echo "Name"; ?><input id="contact_name" class="contact_name loginc"   type="text" /></label> 
                <span class ="con_first"> </span><br><br>

                <label class="label1"><?php echo "Email Address"; ?><input class=" loginc"   id="contact_email" type="text" /></label> 
                <span class ="con_email"> </span><br><br>

                <label class="label1"><?php echo "Query / Suggestions"; ?><textarea  class=" loginc"   rows="4" cols="50" class="textarea" id="contact_suggestion"></textarea></label><br><br><br>
                <span class ="con_data"> </span><br>

                <input id="b1" onclick="contactUs()" type="button" value=
                "send" />

            </div>

                <div class="para"></div>

    <div class="contact-strip">Likes & Links to Follow Us</div>
		  <div class= "footer">

            <div class="footer_content">

                <div class="clearfix">

                    <ul class="grid_3">
                        <h2>Company</h2>
                        <li>
                            <a href="/company/about" title="About">About</a>
                        </li>
                        <li>
                            <a href="http://blog.loadimpact.com/" title="Blog">Blog</a>
                        </li>
                        <li>
                            <a href="http://news.cision.com/load-impact" title="Press room">Press room</a>
                        </li>
                    </ul>
                    <ul class="grid_3">
                        <h2>Products</h2>
                        <li>
                            <a href="/features" title="Features">Features</a>
                        </li>
                        <li>
                            <a href="/pricing" title="Pricing">Pricing</a>
                        </li>
                        <li>
                            <a href="/consulting" title="Consulting">Consulting</a>
                        </li>
                        <li>
                            <a href="/page-analyzer" title="Page analyzer">Page analyzer</a>
                        </li>
                    </ul>
                    <ul class="grid_3">
                        <h2>Support</h2>
                        <li>
                            <a href="http://support.loadimpact.com" title="Support">Support</a>
                        </li>
                        <li>
                            <a href="http://support.loadimpact.com/knowledgebase/topics/29110-case-studies" title="Case studies">Case studies</a>
                        </li>
                        <li>
                            <a href="/contact" title="Contact">Contact</a>
                        </li>
                        <li>
                            <a href="http://developers.loadimpact.com" title="Developers">Developers</a>
                        </li>
                    </ul>
                             </div>
              </div>
             <div class="icon">
	            <a href="index.php"><img alt="" src="../images/f.gif" /></a>
	            <a href="index.php"><img alt=""  src="../images/t.png" /></a>
	            <a href="index.php"><img alt=""  src="../images/i.png" /></a>
        </div>
               <p class="reserve"> 
               	{Copyright 2013. All rights reserved.}
               </p>
        </div>
				
		</div>
	</body>
</html>
