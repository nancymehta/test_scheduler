value_move=0;
plus=0;
topvalue = 0;
textval = 0;
$(document).ready(function() {


	$("#new_test_div").hide();
	var flag=0;
	$("#add_test").click(function(){
		$("#new_test_div").slideToggle('slow');
		if(!flag)
		{
			$("#add_test").text("Close New Test");
			flag=1;
		}
		else
		{
			$("#add_test").text("Create New Test");
			flag=0;
		}
		
		
	});
	$(".innerdiv1").hide();
	var flag=0;
	$("#addOptions").click(function(){
		$(".innerdiv1").slideToggle('slow');
		if(!flag)
		{
			$("#addOptions").text("Hide Option");
			flag=1;
		}
		else
		{
			$("#addOptions").text("Add Option");
			flag=0;
		}
	});

	
	// jquery by pankaj
	
	$('#startTime').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss' });
	$('#endTime').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss' });

	
	$("#option1").validate({
		rules: {
			num_random:{
				required:true,
				digits:true				
			}
		
		},
		messages: {
			num_random:{
				required:"Please enter total no. of question.",
				digits:"Invalid number."
			}
			
		}
	});
	
	$("#option2").validate({
		rules: {
			cat_id_0:{
				required:true,
				digits:true				
			}
		
		},
		messages: {
			cat_id_0:{
				required:"Please enter questions per category.",
				digits:"Invalid number."
			}
			
		}
	});
	
	
	$("#tog_random").click(function(){
		$("#dotog_random").toggle();
		});
		$("#tog_randomopt1").click(function(){
		$('#dotog_randomopt1').toggle();
		});
		$('#tog_randomopt2').click(function(){
		$('#dotog_randomopt2').toggle();
		});
		$('#tog_certs').click(function(){
		$('#dotog_certs').toggle();
		});
		$('#editLink_tn').click(function(){
		$('#misc_cat hide').show();
		});
	

	
	$("#user_test_info_form").validate({
		rules: {
			firstName:{
				required:true,
					checkAlpha:true				
			},
			lastName:{
				required:true,
					checkAlpha:true				
			},
			email:{
				required: true,
				email:true
			}
		},
		
		messages: {
			firstName:{
				required:"Enter first name.",
				checkAlpha:"Only character are required."
			},
			lastName:{
				required:"Enter last name.",
				checkAlpha:"Only character are required."
			},
			email:{
				required:"Enter email.",
				email:"Invalid email."
			}
		}
	});
	
	
	$("#exam_settings").validate({
			rules: {
				timeDuration:{
					required:true,
					digits:true				
				},
				perPageQuestions:{
					required:true,
					digits:true				
				},
				passingMarks:{
					required:true,
					digits:true				
				},
			
			},
			messages: {
				timeDuration:{
					required:"Please enter test duration.",
					digits:"Invalid duration."
				},
				perPageQuestions:{
					required:"Please enter test per page questions.",
					digits:"Invalid number."
				},
				passingMarks:{
					required:"Please enter passing marks.",
					digits:"Invalid passing marks."
				},
				
			}
		});
//js suraj


    $('body').click(function(){
    
    })
    var tech1 = $('.tech-services');
    var serv = $('.menu-services');
    tech1.hide();
    serv.hide();
    $('.services').click(function(){
    tech1.hide();
    serv.toggle();
    })


    $('.tech').click(function(){
    tech1.toggle();
    serv.hide();
    });



$('.table1').dataTable();


//js end suraj

<!------------ Js Gaurav Suman---------!>


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
           
              $(".registerdiv").css("display","block").hide().fadeIn('slow');;
        

           
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

    },500);

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

    },500);

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

   
});

// - -------------------------------------------End of code for top window-------------------------------    

// - -------------------------------------------start of code for slider-------------------------------

function slideImage1() {
    if (topvalue < -2450) {
        topvalue = 0;
    } else {
        $("#slider1").animate({
            top: topvalue
        }, 1000);
        topvalue = topvalue - 370;
    }
    switch (textval) {

    case 0:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("We allow users to share articles with other members who share a common interest in a topic. Join a group to submit topical articles that other members would be interested in.");
        textval = 1;
        break;
    case 1:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("A social network site isn't very social without the ability to communicate with each other. We included a private messaging module with Pligg, so that you can send your friends a message that they can respond to.");
        textval = 2;
        break;
    case 2:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("Each user that signs up on a Pligg site gets their own profile page where they can change their settings, send personal messages, add an avatar, make friends and other great features.");
        textval = 3;
        break;
    case 3:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("We've done our best to help drive more traffic to your site by being as search engine friendly as possible. Our SEO methods will help get your site indexed faster and more often.");
        textval = 5;
        break;

    case 5:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("We're big fans of using RSS feeds to follow the latest news from our favorite sites and that's why we have added RSS functionality all over Pligg. You can subscribe to a user's voting trends, the front page, upcoming page and categories.");
        textval = 6;
        break;

    case 6:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("We use the Smarty template system to keep our code separate from the design. This makes updating your site to the latest version of Pligg easier, and designing new templates a breeze. View free templates listed on the forum.");
        textval = 7;
        break;

    case 7:

        $('.slidertopdiv p').fadeOut("slow").delay(2000).fadeIn("fast").html("A social network site isn't very social without the ability to communicate with each other. We included a private messaging module with Pligg, so that you can send your friends a message that they can respond to.");
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

  $(".sub-menu_list").show("2000");

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











/************************Validations by pankaj**********************************/

//Registration form
$(document).ready(function(){
	$.validator.addMethod("checkAlpha", function(value, element) 
		{
			return this.optional(element) || /^[a-z \-,]+$/i.test(value);
    	}
    );
});

$(document).ready(function() {
	 $("#login_form").validate({
         rules: {
             user_name: {
                 required: true,
                 
             },
             password : {
                 required: true,
               
             }
         },
             
         messages: {
             user_name: {
                 required:"User Name Is Required.<br/>",
               
             },
             password: {
                 required:"Password Is Required.<br/>",
               
             }
        },
     });
	 
	$("#register_form").validate( {
		 rules: {
         	username:  {
                 required:true,
                 checkAlpha:true
                 },
                 password:{
                	 required:true
                 },
                 confirm_password: {
                	 required:true,
                 	equalTo:"#password"
                 },
                 first_name:{
                	 required:true,
                	 checkAlpha:true
                 },
                 last_name:{
                	 required:true,
                	 checkAlpha:true
                 },
                 email:{
                	 required:true,
                	 email:true
                 },
            	},
              
         messages: {
         	username:  {
         		required:"Please enter user name.", 
                 checkAlpha:"Only character are required."
                 },
            password:{
                	 required:"Please enter password."
                 },
                 confirm_password: {
                	 required:"Please enter confirm password.",
                 	equalTo:"Password does't match."
                 },
                 first_name:{
                	 required:"Please enter first name.",
                	 checkAlpha:"Only character are required."
                 },
                 last_name:{
                	 required:"Please enter last name.",
                	 checkAlpha:"Only character are required."
                 },
                 email:{
                	 required:"Please enter email.",
                	 email:"Invalid email."
                 },
            	},
            	
        });
	
	$("#contactus").validate({
		rules: {
			contact_name:{
				required:true,
				checkAlpha:true				
			},
		contact_email: {
			required:true,
			email:true
		},
		contact_suggestion :{
			required : true,
			checkAlpha :true
		}
		},
		messages: {
			test_name:{
				required:"Please enter contact name.",
				checkAlpha:"Only character are required."
			},
			contact_email: {
				required:"Please enter email.",
				email:"Invalid email."
			},
			contact_suggestion :{
				required : "Enter suggestion",
				checkAlpha :"Only character are required."
			}
		}
	});
	
	});

$(document).ready(function(){
	$("#addCategoryForm").validate({
		rules: {
			categoryName:{
				required:true,
				checkAlpha:true,				
			}
		},
		messages:{
			required:"Please enter category name.",
			checkAlpha:"Only character are required.",
		},
	});
});

$(document).ready(function(){
	$("#add_test_form").validate({
		rules: {
			test_name:{
				required:true,
				checkAlpha:true				
			}
		},
		messages: {
			test_name:{
				required:"Please enter test name.",
				checkAlpha:"Only character are required."
			},
		}
	});
});  


function valid_search_user()
{
	if(($("#first_name").val() == '') && ($("#last_name").val() == '') && ($("#email").val() == ''))
	{
			alert("Enter any field");
			return false;
	}
	else 
	{
		
		var valid = $("#search_form").validate({
			rules: {
			first_name:{
					checkAlpha:true				
				},
			last_name:{
					checkAlpha:true				
				},
			email:{
				required: false,
				email:true
			}
			},
			messages: {
			first_name:{
					checkAlpha:"Only character are required."
				},
			last_name:{
					checkAlpha:"Only character are required."
				},
				email:{
					required: false,
					email:"Invalid email."
				}
			}
		}).form();
	
		if(valid){
			return true;
		} else {
			return false;
		}
		
	}
}









