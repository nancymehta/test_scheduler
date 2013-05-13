$(document).ready(function(){
	// js of user_examiner view...
	var valincr = 3;
	   $("#addButton").click(function (){
		  if(valincr>5){
	            alert("Maximum 5");
	            return false;
			}   
			$('.s_upload_table').append('<tr id="dynamic"><td><textarea class="text_right_generic" cols=15 rows=1 id=ques'+valincr+' name=ques'+valincr+'></textarea></td><td><input type="checkbox" id=check'+valincr+' name=check'+valincr+' /></td><td><textarea class="text_right_generic" cols=15 rows=1 id=feedback'+valincr+' name=feedback'+valincr+'></textarea> </td></tr>');
			valincr++;	
		});
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
		 $("#divView1").hide();
	    $("#divView2").hide();
	    $("#divView3").hide();
	    $("#divView4").hide();
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
		function deleteCategory(cat_id) {
	var ans	=	confirm("Are you Sure you want to delete this category ?");
	if (ans	==	true) {
		window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id);
	}
	
}

function updateCategory(cat_id,name) {
	var cat_name	=	name;
	var ans = prompt("Enter the new value of Category",cat_name);
	if(ans==null || ans===false){
	window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id+"&catName="+cat_name);
	}else{
	window.location.assign("<?php echo SITE_PATH;?>category/manageCategory&id="+cat_id+"&catName="+ans);
}
}

function checkCategoryValue()
{
	
}
// js of user_examiner_view ends here...

// js of admin view

function fetchTestContent(id) {
		$("#hidden").toggle();
		$("#hidden").load("<?php echo SITE_PATH;?>admin/fetchTestContents","id="+id);
	}
	function deleteTest(id) {
		if(id) {
			$.ajax( {
				type: "POST",
				url: "<?php echo SITE_PATH;?>admin/deleteTest",
				data: "id="+id,
			    success: function(response){
					if(response=='DELETED'){
						alert("The Test Has Been Successfully Deleted");
						window.location.href="<?php echo SITE_PATH;?>admin/testmanagement";
					}
                },
				error: function () {
					alert("Error Occurred While Processing Your Request.");
				},
			});
		} else {
			alert("Invalid Command");
		}
		
	}
	function send_form(id)
        {
          
		$.ajax({
    			type: "POST",
    			url:  "<?php echo SITE_PATH;?>admin/editUserDetails",
    			data: $('#send').serialize() +"&id=" +id,
    			success: function(response){
				alert("the user details has been successfully changed" );
				window.location.href="<?php echo SITE_PATH;?>admin/usermanagement";
                        },
    			     
    		}); // end of ajax
                 
	} 
function submit(id){
		$('.text'+id).html('<input type=text name=feed'+id+' id=feed'+id+' /><input type=button value=send onclick=send('+id+'); />');
	}

	function send(id){
		var body= $('#feed'+id).val();
		$.ajax({ 
				type:"POST",
				url: "<?php echo SITE_PATH;?>admin/adminMailSend",
				data: "id="+id+"&body="+body,
				 success: function(response){
					 if(response){
						 alert("Mail Sent");
					 }
					 else{
						 alert("Mail Not Sent");
					 }
				 }
		});
	}

	/*Function Name:submit1,parameter passed:1 ,to submit the id of the user*/
		function submit1(id,request)
		{
        	$.ajax( {
				type: "POST",
				url: "<?php echo SITE_PATH;?>admin/showUserDetails",
				data: "id="+id+"&request="+request,
			    success: function(response){
					if(request=='DELETE'){
						alert("the user has been successfully deleted");
						window.location.href="<?php echo SITE_PATH;?>admin/usermanagement";
					} else{
                			$(".um").html(response);
						}
                			},
			} );
		} 

});