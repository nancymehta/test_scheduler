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
        	$.ajax( {
				type: "POST",
				url: "<?php echo SITE_PATH;?>admin/showUserDetails",
				data: "id="+id+"&request="+request,
			    success: function(response){
					if(request=='DELETE'){
						alert("<?php echo UMSG;?>");
						window.location.href="<?php echo SITE_PATH;?>admin/usermanagement";
					} else{
                			$(".um").html(response);
						}
                			},
			} );
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
						<td><a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'EDIT')"><?php echo EDIT;?></a> <a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'DELETE')"><?php echo DELETE;?></a></td>
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

