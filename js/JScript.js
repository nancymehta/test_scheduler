/*
* Filename : jScript.js
* Authour : suraj,ankit
* Description : file containing main website js 
* Date_of_creation : 1-march-2013
*/

value_move=0;
plus=0;
topvalue = 0;
textval = 0;
$(document).ready(function() {

//---------------------------------------- code to run services image gallary ------------ 
setInterval(function() {
    $('.next').trigger('click');
}, 6000);
$('.next').click(function(){
    if (value_move <= -3200)
    {
      value_move=0;
    }else{

    value_move=value_move-805;
     
    }$('.inner-container-move').animate({

      "margin-left":value_move+"px"

    },500).fadeOut("slow").fadeIn("fast");

  });


   $('.back').click(function(){
    if (value_move >= 0)
    {
      value=0;
      plus=0;
    }
    else{
      plus=805;
    }
    value_move=value_move+plus;
    $('.inner-container-move').animate({

      "margin-left":value_move+"px"

    },500).fadeOut("slow").fadeIn("fast");

  });




//----------------------------------------End  of code to run services image gallary ------------

//------------------------Code for providing shortcut keys to Slider menus--------------------------------

$('body , document').keyup(function(e){

if(e.shiftKey && e.keyCode == 76 && e.altKey){
    $('dd').filter(':nth-child(n+4)').hide();
    $(".login1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);
}

if(e.shiftKey && e.keyCode == 72 && e.altKey){
    $('dd').filter(':nth-child(n+4)').hide();
    $(".home1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);       
}

if(e.shiftKey && e.keyCode == 65 && e.altKey){
    $('dd').filter(':nth-child(n+4)').hide();
    $(".about1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);
}

if(e.shiftKey && e.keyCode == 67 && e.altKey){
          $('dd').filter(':nth-child(n+4)').hide();
          $(".contact1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);
}

if(e.shiftKey && e.keyCode == 83 && e. altKey){
          $('dd').filter(':nth-child(n+4)').hide();
            $(".services1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200); 
}

if(e.shiftKey && e.keyCode == 82 && e.altKey){
          $('dd').filter(':nth-child(n+4)').hide();
            $(".register1").slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);
}

if( e.shiftKey && e.keyCode == 85 && e.altKey){
  $('body,html').animate({scrollTop: 0}, 1000);
}


});

//-----------------------------end of shortcut keys code--------------------------------------------


    var topvalue = 0;
    $('#p1,#p2').hide();

//----------------------------code for username and password on focus--------------------------------
    $("#user_name,#password").focus(function() {
        $(this).css("background-color","white");
  $(this).css({"color":"black"});
  
    });
//----------------------------end of code for username and password on focus--------------------------------

 
//----------------------------code for on focus of variables while registering------------------------------------------------------------------
    $("#reg_user_name,#reg_password,#reg_confirm_password,#reg_first_name,#reg_last_name,#reg_email,#reg_address,#reg_phone,#reg_age,#reg_dob").focus( function(){
 
  $(this).css("background-color","white");
  $(this).css({"color":"black"});
  

  });
//---------------------------- end of code --------------------------------------------------------------------------------------------------


//----------------------------code for contact us field on focus-------------------------------------------
    $("#contact_suggestion,#contact_email,#contact_name").focus(function() {
        $(this).css("background-color","white");
  $(this).css({"color":"black"});
  
    });
//----------------------------end of code -----------------------------------------------------------------

   

// - -------------------------------------------start of code for top window-------------------------------    
    $('.top').hide();
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.top').fadeIn();
        } else {
            $('.top').fadeOut();
        }
    });
    $('.top a').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
    });

    $('dd').filter(':nth-child(n+4)').hide();
    $('dt').click(function() {
        $(this).next().slideDown(200).fadeOut('fast').fadeIn('fast').siblings('dd').slideUp(200);
    });
});

// - -------------------------------------------End of code for top window-------------------------------    

// - -------------------------------------------start of code for slider-------------------------------

function slideImage1() {
    if (topvalue < -2400) {
        topvalue = 0;
    } else {
        $("#slider1").animate({
            top: topvalue
        }, 1500).fadeOut("fast").fadeIn("slow");
        topvalue = topvalue - 450;
    }
    switch (textval) {

    case 0:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("We allow users to share articles with other members who share a common interest in a topic. Join a group to submit topical articles that other members would be interested in.");
        textval = 1;
        break;
    case 1:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("A social network site isn't very social without the ability to communicate with each other. We included a private messaging module with Pligg, so that you can send your friends a message that they can respond to.");
        textval = 2;
        break;
    case 2:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("Each user that signs up on a Pligg site gets their own profile page where they can change their settings, send personal messages, add an avatar, make friends and other great features.");
        textval = 3;
        break;
    case 3:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("We've done our best to help drive more traffic to your site by being as search engine friendly as possible. Our SEO methods will help get your site indexed faster and more often.");
        textval = 5;
        break;

    case 5:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("We're big fans of using RSS feeds to follow the latest news from our favorite sites and that's why we have added RSS functionality all over Pligg. You can subscribe to a user's voting trends, the front page, upcoming page and categories.");
        textval = 6;
        break;

    case 6:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("We use the Smarty template system to keep our code separate from the design. This makes updating your site to the latest version of Pligg easier, and designing new templates a breeze. View free templates listed on the forum.");
        textval = 7;
        break;

    case 7:

        $('.slidertopdiv p').fadeOut("slow").delay(1000).fadeIn("slow").html("A social network site isn't very social without the ability to communicate with each other. We included a private messaging module with Pligg, so that you can send your friends a message that they can respond to.");
        textval = 0;
        break;
    }
}
setInterval("slideImage1()", 5000);

// - -------------------------------------------End of code for slider-------------------------------

// - ------------------------------------------- start validate login/varify authenticaion ajax -------------------------------    

function checklogin() 
{
    user_name = $('#user_name').val();
    password = $('#password').val();
    if ((user_name == "" && password == "") || (user_name == null && password == null)) {
        $("#user_name").css("background-color", "#FF0000");
        i = 0;
        $("#password").css("background-color", "#FF0000");
        $("#user_name").css({ "opacity": "0.5","color": "white"});
        $("#password").css({ "opacity": "0.5","color": "white"});
         $(".log_data").html("Enter valid username and password");
    }
    else {
        $.ajax({
            type: "GET",
            url: 'model/index.php',
            data: "codetorun=0&user_name=" + user_name + "&password=" + password + "",
            beforeSend: function() {
},
            success: function(data) {
                //   $('#p1').html().remove().html(data);
                //$('#p1').text(data).hide().fadeIn("3000");
             
                if ($.trim(data) == 'You are not logged in') {

                    $('#p1').text("You are not logged in").hide().fadeIn("3000");
                } else {
                    window.location.href = "./index.php?function=loadDasboard";
                }

            },
            complete: function() {
},
            error: function() {}
        });
    }
}
// - ------------------------------------------- End validate login/varify authenticaion ajax-------------------------------    


// - ------------------------------------------- start validate contact us fields authenticaion ajax -------------------------------    


function contactUs() { 
    err=0;
    contact_name = $('#contact_name').val();
    contact_email = $('#contact_email').val();
    contact_suggestion = $('#contact_suggestion').val();
    
          reg_exp = "^[A-Z a-z]+$";
               if(!(contact_name.match(reg_exp)))
               {
                err=1;
                $(".con_first").html("Only alphabets");
                $("#contact_name").css("background-color","#FF0000");
                $("#contact_name").css({"opacity":"0.5","color":"white"});
              }
              else
              {
               $(".con_first").html("");
              }
               if(contact_name == "") {
                   err=1;
                   $(".con_first").html("Can't be blank");
                $("#reg_first_name").css("background-color","#FF0000");
                $("#reg_first_name").css({"opacity":"0.5","color":"white"});
               }

                reg_exp_email="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
                if (!(contact_email.match(reg_exp_email))) { 
                      err=1;
                      $(".con_email").html("Not a valid e-mail");
                       $("#contact_email").css("background-color","#FF0000");
                       $("#contact_email").css({"opacity":"0.5","color":"white"});
                    }   
                 else
                 {
                  $(".con_email").html("");
                 }   
                 if(contact_email == "")    {  
                  err=1;
                  $(".con_email").html("Can't be blank");
                  $("#contact_email").css("background-color","#FF0000");
                  $("#contact_email").css({"opacity":"0.5","color":"white"});                     
                 }
     
             if(contact_suggestion == "")    {  
                        err=1;
                        $(".con_data").html("Can't be blank");
                      $("#contact_suggestion").css("background-color","#FF0000");
                       $("#contact_suggestion").css({"opacity":"0.5","color":"white"});          
                     }  
                     else
                    {
                    $(".con_data").html("");
                    }    

    if(err==1)
    {}    
    else {
        $.ajax({
            type: "GET",
            url: 'model/contactus.php',
            data: "contact_name=" + contact_name + "&contact_email=" + contact_email + "&contact_suggestion=" + contact_suggestion + "",
            beforeSend: function() {

},
        success: function(data) {
     	if(data.substr(data.length-1)=="!")
                            {

                           alert ("Thanks for Your suggestion , we'll contact you soon !!");
                             window.location.href="index.php";
                            }
                        else
                            {

                            alert ("Thanks for Your suggestion , we'll contact you soon !!");
                              window.location.href="index.php";
                            }

        },
        complete: function() {
},
        error: function() {}
    });
}
}
//----------------------------------end of function-----------------------------------------------------------------


// - ------------------------------------------- start validate registration fields authenticaion ajax -------------------------------    

function register() {

    reg_user_name = $("#reg_user_name").val();

    t1 = $("#t1").val();

    reg_password = $("#reg_password").val();

    reg_confirm_password = $("#reg_confirm_password").val();

    reg_first_name = $("#reg_first_name").val();

    reg_last_name = $("#reg_last_name").val();

    reg_email = $("#reg_email").val();

    reg_address = $("#reg_address").val();

    reg_phone = $("#reg_phone").val();

    reg_dob = $("#reg_dob").val();
    err=0;
    reg_age = $("#reg_age").val();
    reg_gender = $("#reg_gender").val();
    reg_country = $("#reg_country").val();


                reg_exp = "^[A-Za-z][A-Za-z0-9]+$";
                 if(!(reg_user_name.match(reg_exp))) {
                  err=1;
                        $(".user").html("Only alphanumeric").hide().fadeIn("slow");
                        $("#reg_user_name").css("background-color","#FF0000");
                        $("#reg_user_name").css({"opacity":"0.5","color":"white"});
                 }
                 else
                      {
                         $(".user").html("");
                      }
                  if(reg_user_name == "" ) {
                     err=1;
                        $(".user").html("Can't be blank");
                        $("#reg_user_name").css("background-color","#FF0000");
                        $("#reg_user_name").css({"opacity":"0.5","color":"white"});
                      }
                      

               if(reg_password == "" || reg_password == null) {
                          err=1;
                          $(".reg_pass").html("Can't be blank").hide().fadeIn("slow");;
                        $("#reg_password").css("background-color","#FF0000");
                        $("#reg_password").css({"opacity":"0.5","color":"white"});
                      } 
                      else
                      {
                         $(".reg_pass").html("");
                      }
                if(reg_confirm_password != reg_password) {
                  err=1;
                   $(".reg_conpass").html("Password doesn't match").hide().fadeIn("slow");
                   $("#reg_password").css("background-color","#FF0000");
                  $("#reg_password").css({"opacity":"0.5","color":"white"});
                $("#reg_confirm_password").css("background-color","#FF0000");
                $("#reg_confirm_password").css({"opacity":"0.5","color":"white"});
                }
                else
                {
                   $(".reg_conpass").html("");
                }
               if(reg_confirm_password == "") {
                   err=1;
                   $(".reg_conpass").html("Can't be blank").hide().fadeIn("slow");
                $("#reg_confirm_password").css("background-color","#FF0000");
                $("#reg_confirm_password").css({"opacity":"0.5","color":"white"});
               }   

               reg_exp = "^[A-Za-z]+$";
               if(!(reg_first_name.match(reg_exp)))
               {
                err=1;
                $(".reg_first").html("Only alphabets").hide().fadeIn("slow");
                $("#reg_first_name").css("background-color","#FF0000");
                $("#reg_first_name").css({"opacity":"0.5","color":"white"});
              }
              else
              {
               $(".reg_first").html("");
              }
               if(reg_first_name == "") {
                   err=1;
                   $(".reg_first").html("Can't be blank").hide().fadeIn("slow");
                $("#reg_first_name").css("background-color","#FF0000");
                $("#reg_first_name").css({"opacity":"0.5","color":"white"});
               }
               reg_exp = "^[A-Za-z]+$";
               if(!(reg_last_name.match(reg_exp)))
               {
                err=1;
                 $(".reg_last").html("Only alphabets").hide().fadeIn("slow");
                $("#reg_last_name").css("background-color","#FF0000");
                $("#reg_last_name").css({"opacity":"0.5","color":"white"});
               }
               else
               {
                $(".reg_last").html("");
               }
               if(reg_last_name == "") {
                   err=1;
                $(".reg_last").html("Can't be blank").hide().fadeIn("slow");
                $("#reg_last_name").css("background-color","#FF0000");
                $("#reg_last_name").css({"opacity":"0.5","color":"white"});
               }


              
             reg_exp_email="^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$";
                if (!(reg_email.match(reg_exp_email))) { 
                      err=1;
                      $(".reg_mail").html("Not a valid e-mail").hide().fadeIn("slow");
                       $("#reg_email").css("background-color","#FF0000");
                       $("#reg_email").css({"opacity":"0.5","color":"white"});
                    }   
                 else
                 {
                  $(".reg_mail").html("");
                 }   
                 if(reg_email == "")    {  
                  err=1;
                  $(".reg_mail").html("Can't be blank").hide().fadeIn("slow");
                  $("#reg_email").css("background-color","#FF0000");
                  $("#reg_email").css({"opacity":"0.5","color":"white"});                     
                 }

                    if(reg_address == "")    {  
                        err=1;
                        $(".reg_addr").html("Can't be blank").hide().fadeIn("slow");
                      $("#reg_address").css("background-color","#FF0000");
                       $("#reg_address").css({"opacity":"0.5","color":"white"});          
                     }  
                     else
                    {
                    $(".reg_addr").html("");
                    }    

                    if(reg_dob == "")    { 
                    err=1;  
                     $(".reg_date").html("Can't be blank").hide().fadeIn("slow");
                     $("#reg_dob").css("background-color","#FF0000");
                       $("#reg_dob").css({"opacity":"0.5","color":"white"});                       
                    }
                    else
                    {
                       $(".reg_date").html("");
                    }
                reg_exp="^[0-9]+$";
                if(!(reg_phone.match(reg_exp)))
                {
                 err=1;
                 $(".reg_num").html("Only numbers").hide().fadeIn("slow");
                  $("#reg_phone").css("background-color","#FF0000");
                  $("#reg_phone").css({"opacity":"0.5","color":"white"});
                }
                else
                {
                  $(".reg_num").html("");
                }
                if(reg_phone == "")
                 {
                    err=1;
                    $(".reg_num").html("Can't be blank").hide().fadeIn("slow");
                  $("#reg_phone").css("background-color","#FF0000");
                  $("#reg_phone").css({"opacity":"0.5","color":"white"});
                 }
                
                reg_exp="^[0-9]+$";
                if(!(reg_age.match(reg_exp)) || reg_age > 100)
                {
                  err=1;
                  $(".reg_a").html("Only numbers & less than 100").hide().fadeIn("slow");
                  $("#reg_age").css("background-color","#FF0000");
                  $("#reg_age").css({"opacity":"0.5","color":"white"});
                }
                else
                {
                  $(".reg_a").html("");
                }
                if(reg_age == "")
                  {
                    err=1;
                     $(".reg_a").html("Can't be blank").hide().fadeIn("slow");
                  $("#reg_age").css("background-color","#FF0000");
                  $("#reg_age").css({"opacity":"0.5","color":"white"});
                 }

if(err==1)
{


}else{


    $.ajax({
        type: "GET",
        url: 'model/index.php',
        data: "codetorun=registerme&reg_user_name=" + reg_user_name +
         "&reg_password=" + reg_password + "&reg_first_name=" + reg_first_name + 
         "&reg_last_name=" + reg_last_name + "&reg_email=" + reg_email + 
        "&reg_address=" + reg_address + "&reg_phone=" + reg_phone + "&reg_dob=" +
         reg_dob + "" + "&reg_age=" + reg_age + "&reg_gender=" + reg_gender + "&reg_country=" 
         + reg_country + "&t1="+t1+"",

        beforeSend: function() {
},
        success: function(data) {
           
			if($.trim(data) == "Email-ID already registered with us")
			{
			$('#p2').text(data).hide().fadeIn("3000");
			}
            else if ($.trim(data) == "user already exists") {
               
                $('#p2').text(data).hide().fadeIn("3000");
            } else if ($.trim(data) == "1") {
                alert("successfully registered");
                 window.location.href="index.php";
              
            }
            else if ($.trim(data) == "3") {
                 $('#p2').text("captcha not matched !! try again").hide().fadeIn("3000");
              
            }

        },
        complete: function() {
},
        error: function() {}
    });
}
}

//----------------------------------end of function-----------------------------------------------------------------

//--------------------------------------function for password strength-------------------------------------------------------
function check(){

str = $('#reg_password').val();
pat1= /(?=.*\d)(?=.*[a-z]).{6,9}/;

pat2= /(?=.*\d)(?=.*[A-Z#]).{6,11}/;

pat3= /(?=.*\d)(?=.*[A-Z])(?=.*[@!#]).{6,12}/;

pat4= /(?=.*\d)(?=.*[A-Z])(?=.*[\\%._]).{6,13}/;

$('.strength').css({width:"20px"},"fast");
if (str.match(pat1))
{
  
$('.strength').css({width:"80px"});
}
if(str.match(pat2)) { 
$('.strength').css({width:"130px"});
}
if(str.match(pat3)) { 
$('.strength').css({width:"170px"});
}
if(str.match(pat4)) { 
$('.strength').css({width:"230px"});
}
}
//----------------------------------end of function-----------------------------------------------------------------

//-------------------function for Admin-login authentication -------------------------
function checkAdminlogin() 
{
    user_name = $('#admin_username').val();
    password = $('#admin_password').val();
    if ((user_name == "" && password == "") || (user_name == null && password == null)) {
        $("#admin_username").css("background-color", "#FF0000");
        i = 0;
        $("#admin_password").css("background-color", "#FF0000");
        $("#admin_username").css({ "opacity": "0.5","color": "white"});
        $("#admin_password").css({ "opacity": "0.5","color": "white"});
         
    }
    else {
        $.ajax({
            type: "GET",
            url: '../admin-model/index.php',
            data: "codetorun=0&user_name=" + user_name + "&password=" + password + "",
            beforeSend: function() {
},
            success: function(data) {
                
                if ($.trim(data) == 'You are not logged in') {

                    $('#p1').text("You are not logged in").hide().fadeIn("3000");
                } else {
                    window.location.href = "../index.php?function=loadAdminDasboard";
        
                }

            },
            complete: function() {
},
            error: function() {}
        });
    }
}
// - ------------------------------------------- End admin validate login/varify authenticaion ajax-------------------------------    
