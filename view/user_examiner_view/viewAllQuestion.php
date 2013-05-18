<html>
    <head>
        <title>View question categorywise</title>
    </head>
    <body>
        <div>
            <div style="border: 1px solid green; margin-top:2cm; ">
	            <form id='formCategory' name='form_categoty'>
		            <label>
							Category:
						</label>
						<select class="select_generic" id='dropdown' name='dropdown'>
						<!--<option value="0">PHP</option>
							<option value="1">MYSQL</option> 
						-->
						<?php
						if(isset($arrData)){
								
						}else{
							$arrData=NULL;
						}
						if(isset($arrData)){
			                 $i = 0;
			                 while ( (! empty($arrData['category_name'][$i] )) ) {
			                 echo "<option>";
			                 echo ($arrData['category_name'] [$i] );
			                 echo "</option>";
			                 $i++;
			                 }
			            }
			            else{
			            	echo "<option>no test category</option>";
			            }
		                ?>
							
					</select>
	            </form>
            </div>
            <div id="divQuestion" style="border: 1px solid green;margin-top:2cm;">
            fdsf
            </div>
        </div>
    </body>
    <script>
    jQuery(document).ready(function() {    
   	 var category="";
    	

    		$('select[name=dropdown]').change(function() {
        	    alert($(this).val());
        	     category = $(this).val();
        	    funcSearch();
        	});

    		function funcSearch()
    		{
				
        			 $.ajax({ 
	    		      type: "POST",
	    		      url: "<?php  echo SITE_PATH; ?>user/viewedAllQuestions",
	    		      //data: $('#form_categoty').serialize(),
	    		      data:"category="+category,
	    		      success: function(response)
	    		      {
		    		    // alert(response); 
						$("#divQuestion").html(response);
					    //personal_details();		  
						}
	
				});
	 		
				//alert('hye');
	            		   
   
			}

    	
    	
 	});
    </script>
</html>
