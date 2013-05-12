<?php 
/* @author 		 :Shashank Verma
 * @created on   :07-05-2013
 * @desc		 :create body of main page 
 ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 ************************************************************	
 *
*/
?>
<div class="para"></div>
<div id ="mainSlider" class = "mainSlider">
				<div class = "imgSlider">
				
            <div class="home">
                <div class="slidertopdiv">

                <p></p>
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
    <div class="contact-strip bg-mid-gray">Our Services / clients / Toppers</div>
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
			<div class="para"></div>
				
    <div class="contact-strip bg-mid-gray">Contact Us</div>
            <div class=" val">
        
        	<form action="<?php echo SITE_PATH;?>admin/sendmail" id="contactus" method="post" >
                <label class="label1"><?php echo "Name"; ?></label><input id="contact_name" name="contact_name" class="contact_name loginc"   type="text" /> 
                <span class ="con_first"> </span><br><br>

                <label class="label1"><?php echo "Email Address"; ?></label><input class=" loginc" name="contact_email"  id="contact_email" type="text" />
                <span class ="con_email"> </span><br><br>

                <label class="label1"><?php echo "Query / Suggestions"; ?></label><textarea  class=" loginc textarea" name="contact_suggestion"  rows="4" cols="50" class="textarea" id="contact_suggestion"></textarea><br><br><br>
                <span class ="con_data"> </span><br>

                <input id="contactus" name="contactus" onclick="" type="submit" value="send" class="submmit_button_generic" />
			</form>
            </div>

                <div class="para"></div>