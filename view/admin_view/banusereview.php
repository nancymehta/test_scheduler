<?php 
/* @author 		 :Prince Kumar Pandey
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
 function showusers(id){
	 
	 $.ajax( {
			type: "POST",
			url: "<?php echo SITE_PATH;?>admin/activateUser",
			data: "id="+id,
		    success: function(response){
      			$(".um").html(response);
      		}
		});
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
					<th style="font-size:13px" align="left"><?php echo "userId";?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "userName"; ?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "status"; ?>
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
						<td><a href="#" onClick="showusers(<?php echo $umanage['id']; ?>)">Become Active</a></td>
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