$(document).ready(function(){
	//alert("sdfjklasdjf");
	$("#divView1").css("display","none");
    $("#divView2").hide();
    $("#divView3").hide();
    $("#divView4").hide();
// ankit js for result
 $(".all_result_table").css({"display":"none"});
	

$("#testSelect").change(function() {
       $(".all_result_table").css({"display":"block"});
       var a=$("#testSelect").val();
       $("#show_result").load("index.php","controller=result&function=getResults&testId="+a);
       
      
  
    });

//--------------------------------------------------------------------------------
	// js of user_examiner view...
	var valincr = 3;
	   $("#addButton").click(function (){
		  if(valincr>5){
	            alert("Maximum 5");
	            return false;
			}   
		  if(valincr % 2 == 0) {
				$('.s_upload_table').append('<tr class ="even" id="dynamic"><td><textarea class="text_right_generic" cols=15 rows=1 id=ques'+valincr+' name=ques'+valincr+'></textarea></td><td><input type="checkbox" id=check'+valincr+' name=check'+valincr+' /></td><td><textarea class="text_right_generic" cols=15 rows=1 id=feedback'+valincr+' name=feedback'+valincr+'></textarea> </td></tr>');
					valincr++;	
				
	   		} else {
	   			$('.s_upload_table').append('<tr class ="odd" id="dynamic"><td><textarea class="text_right_generic" cols=15 rows=1 id=ques'+valincr+' name=ques'+valincr+'></textarea></td><td><input type="checkbox" id=check'+valincr+' name=check'+valincr+' /></td><td><textarea class="text_right_generic" cols=15 rows=1 id=feedback'+valincr+' name=feedback'+valincr+'></textarea> </td></tr>');
				valincr++;	
			}
			
  /*---- modified by : Amithesh bharti */
			$("#hiddenValue").val(valincr-1);
			var vv= $("#hiddenValue").val();
            
            $("#aReload").click(function (){
			
			      alert('Back');
			      window.history.back(-1);
			});
            
	   });
 /*................................................*/	   
	   $("#removeButton").click(function () {
		   if(valincr==3){
			      alert("Minimum 2");
		          return false;
		       }
	       valincr--;
	        $("#dynamic").remove();  	
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
		$("#add_test").click(function(){
		$(".add_test").show();
		});
		$("#view1").click(function(){
  			$("#divView1").toggle("fast");
		});
		
		$("#view2").click(function(){
  			$("#divView2").toggle("fast");
		});
		$("#view3").click(function(){
  			$("#divView3").toggle("fast");
		});
		$("#view4").click(function(){
  			$("#divView4").toggle("fast");
		});

});








	

	
