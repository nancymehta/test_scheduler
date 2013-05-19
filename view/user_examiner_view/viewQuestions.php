	<table border='1' cellpadding='2' cellspacing='0'
		style='margin-top: 40px; border-collapse: collapse'
		bordercolor='#111111' width='100%' id='AutoNumber2'>
		 <caption>Question Edition Board</caption>
		<tr>
			<td width='100%' bgcolor='#999966'>
				
			</td>
		</tr>
	</table>
	<div style="width:99.7%\">
		<table border='1' cellpadding='0' cellspacing='0'
			style='border-collapse: collapse' bordercolor='#111111' width='100%'
			id='AutoNumber1'>

			<tr>
				<td width='22%' bgcolor='#808080'><b><font color='#FFFFFF'>Question</font></b></td>
			<!--	<td width='12%' bgcolor='#808080'><b><font color='#FFFFFF'>A</font></b></td>
				<td width='12%' bgcolor='#808080'><b><font color='#FFFFFF'>B</font></b></td>
				<td width='12%' bgcolor='#808080'><b><font color='#FFFFFF'>C</font></b></td>
				<td width='12	%' bgcolor='#808080'><b><font color='#FFFFFF'>D</font></b></td>#FF0000#FFFF00
				<td width='9%' bgcolor='#808080'><b><font color='#FFFFFF'>ANS</font></b></td>
				<td width='13%' bgcolor='#808080'><b><font color='#FFFFFF'>Operation</font></b></td> -->
			</tr>
                                        
<?php
if(isset($arrData)){
while ( $row = $arrData->fetch ( PDO::FETCH_ASSOC ) ) {
//print_r( $row );	
	?>
			<tr>

				<td width='24%'><?php echo $row['question'];?></td>
				<td width='14%'><?php //echo $row['id'];?></td>
		    <!--    <td width='14%'><?php // echo $row['B'];?></td>
				<td width='14%'><?php // echo $row['C'];?></td>
				<td width='14%'><?php // echo $row['D'];?></td>
				<td width='3%'><?php // echo $row['ans'];?></td> -->
				<?php $_SESSION['SESS_CATEGORY_ID']= $row['category_id']; ?>
             	<td width='13%'><a href="<?php  echo SITE_PATH; ?>questionBank/deleteQues?qid=<?php echo $row['id'];?>&category=<?php echo $row['category_id'];?>">delete</a>&nbsp;
             	<a href="<?php  echo SITE_PATH; ?>questionBank/editQues?qid=<?php echo $row['id'];?>&category=<?php echo $row['category_id'];?>">edit</a>
             	<button id='edit_btn' >edit</button>&nbsp;
             			
				</td>
		   </tr>
<?php }}?>
        </table>
	</div>
</body>
 <script> 
 /*
     $("#edit_btn").click(function(){
		      
		      var selected = $('#hiddenID').val();
		      alert(selected);
		      //funcSearch();
		 });
	*/	 
		 /*
    		function funcSearch()
    		{
				     
        			 $.ajax({ 
	    		      type: "POST",
	    		      url: "<?php  echo SITE_PATH; ?>questionBank/editQues?qid=<?php echo $row['id'];?>",
	    		      //data: $('#form_categoty').serialize(),
	    		     // data:"category="+category,
	    		      success: function(response)
	    		      {
		    		    alert(response); 
					//	$("#divQuestion").html(response);
					    //personal_details();		  
						}
	
				});
	 		
				//alert('hye');
			}
	            		   
   */
   </script>

</html>
