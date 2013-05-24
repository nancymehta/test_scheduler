<?php 
/* @author 		 :Jasleen Kaur
 * @created on   :10-05-2013
 * @desc		 :create user management page 
 ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 ************************************************************	
 *
*/
?>
<script type="text/javascript">
/*Function Name:submit1,parameter passed:1 ,to submit the id of the user*/
		function submit1(id,request)
		{
			if(request=='DELETE'){
				if(confirm("<?php echo UMSG3;?>")){
			
	        		$.ajax( {
					type: "POST",
					url: "<?php echo SITE_PATH;?>admin/showUserDetails",
					data: "id="+id+"&request=DELETE",
				    success: function(response){
							alert("<?php echo UMSG;?>");
							window.location.href="<?php echo SITE_PATH;?>admin/usermanagement";
						
	                		},
					} );
				}
			}else if(request=='BANUSER'){
				$.ajax( {
					type: "POST",
					url: "<?php echo SITE_PATH;?>admin/showUserDetails",
					data: "id="+id+"&request=BANUSER",
				    success: function(response){
	                			$(".um").html(response);
	                		},
				} );
				}
			
				
		
	
			
			else {
				if(request=='EDIT'){
				$.ajax( {
					type: "POST",
					url: "<?php echo SITE_PATH;?>admin/showUserDetails",
					data: "id="+id+"&request=EDIT",
				    success: function(response){
	                			$(".um").html(response);
	                		},
				} );
				}
			}
				
		} 
	
			

</script>
<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)){
?>
		<table class="table1 table-generic" width="89%" border="1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr style="background-color:#666666; color:#FFFFFF" valign="top">
					<th style="font-size:13px" align="left"><?php echo USER_ID;?>
					</th>
					<th style="font-size:13px" align="left"><?php echo USER_NAME1; ?>
					</th>
					<th style="font-size:13px" align="left"><?php echo OPTIONS; ?>
					</th>   
				</tr>
			</thead>
  			<tbody>
            	<?php 
				foreach($arrData as $umanage){ 
				?>
					<tr valign="top">
                        <td><?php echo $umanage['id']; ?></td>
						<td><?php echo $umanage['username']; ?></td>
						<td>
							<a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'EDIT')"  style="background-color:white;margin-top:5px;"><img src="<?php echo IMAGE_PATH."editb.jpg";?>" style="height:24px;width:24px;"/></a> 
							<a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'DELETE')" style="background-color:white;margin-top:5px;"><img src="<?php echo IMAGE_PATH."delete.gif";?>" style="height:24px;width:24px;"/></a>
							<a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'BANUSER')" style="background-color:white;margin-top:5px;"><img src="<?php echo IMAGE_PATH."banuser2.png";?>" style="height:24px;width:24px;"/></a>
						</td>
					</tr>
				<?php 
				} // end of foreach
				?>
			</tbody>
		</table>
<?php	
	} else { // end of if start of else
				echo "<strong>".UMSG1."</strong>";
		  } // end of else
	?> 
</div>

</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>

