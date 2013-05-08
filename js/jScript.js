value_move=0;
plus=0;
topvalue = 0;
textval = 0;
$(document).ready(function() {

	// Js by Bhanu

	$("#bclose").click(function(){
     $("#logindiv").hide();
        $("#user_name").val("");
        $("#password").val("");
	});
	$("#close1").click(function(){
        $("#registerdiv").hide();
        $("#reg_user_name").val("");
        $("#reg_password").val("");
        $("#reg_confirm_password").val("");
        $("#reg_first_name").val("");
        $("#reg_last_name").val("");
        $("#reg_email").val("");
        $("#reg_dob").val("");
	});
	$("#faq").click(function(){
		
	});
	// js end here
$('.inner-container-partner h1').css({
      "margin-top":'-350px',
      "opacity" : "0.3" 
    });

$('.videoSlider').css({
      'z-index':'0'

    });
$('.videoSlider iframe').css({


      'z-index':'10'

    });


$('.logindiv,.registerdiv').css({

      'z-index':'9999'


    });


 $("#login").click(function(){
        $(".logindiv").css("display","block").hide().fadeIn('slow');
        $(".registerdiv").css("display","none");
        
         
          });


          $("#register").click(function(){
          $(".logindiv").css("display","none");
           
              $(".registerdiv").css("display","block");
        

           
      });
    $('.inner-container-partner h1').click(function(){
        $(this).hide();
        $('.inner-container-partner').animate({


      "margin-top":'-300px'

    },300);

  }); 
   
 $('.inner-container-partner h1').hover(function(){
        
        $('.inner-container-partner h1').animate({


      "margin-top":'-400px',
      "opacity" : "0.5"

    },300);

  }); 
 $('.inner-container-partner h1').mouseout(function(){
        
        $('.inner-container-partner h1').animate({


      "margin-top":'-350px',
      "opacity" : "0.3" 


    },300);

  }); 
   
//---------------------------------------- code to run services image gallary ------------ 
setInterval(function() {
    $('.next').trigger('click');
}, 6000);
$('.next').click(function(){
    if (value_move <= -1600)
    {
      value_move=0;
    }else{

    value_move=value_move-405;
     
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
    if (topvalue < -2450) {
        topvalue = 0;
    } else {
        $("#slider1").animate({
            top: topvalue
        }, 1000).fadeOut("fast").fadeIn("slow");
        topvalue = topvalue - 370;
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


//-------category-------//
$(document).ready(function() {
	$("#addCatergory").click(function(){
		$(".category_div").show();
	});

	$('.fancybox').css({"display":"none"});
	$('.b1').click(function(){
	
	$('.fancybox').css({"display":"block"}).hide().fadeIn("slow");
		$('.box').slideDown("slow");
		$('.fancybox').css({"z-index":"999999","background-color":"black"});
	});
	$('#close').click(function(){
		$('.fancybox').css({"display":"none"});
	});
});


$(document).ready(function() {
	$("#test").hover(function(){
		$(".test-sub-menu").show();
	});

	$("#test").mouseleave(function(){
		$(".test-sub-menu").hide();
	});

	$(".test-sub-menu").hover(function(){
		$(".test-sub-menu").show();
	});

	$(".test-sub-menu").mouseleave(function(){
		$(".test-sub-menu").hide();
	});
}); 
