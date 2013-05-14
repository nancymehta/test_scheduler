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
	function send_form(id)
        {
          $.ajax({
    			type: "POST",
    			url:  "<?php echo SITE_PATH;?>admin/editUserDetails",
    			data: $('#send').serialize() +"&id=" +id,
    			success: function(response){
					if(response==1){
        				alert("<?php echo UMSG2;?>");
						window.location.href="<?php echo SITE_PATH;?>admin/usermanagement";
					}else{
                        alert(response);
            			}
    				}
    			     
    		}); // end of ajax
	} 
</script>

<div class="contact-strip bg-mid-gray">Edit profile
</div>
<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)){
?>
		<form id="send">
			<table class="table-generic table1">
  				<tbody>
               	<?php $umanage=$arrData[0];?>
					<tr valign="top">
                        <td><?php echo USER_NAME; ?>
						</td>
						<td><input type="text" name="username" value="<?php echo $umanage['username']; ?>" />
						</td>
					</tr>
					<tr valign="top">
                        <td><?php echo FIRST_NAME; ?>
						</td>
						<td><input type="text" name="first_name" value="<?php echo $umanage['first_name']; ?>" />
						</td>
					</tr>
					<tr valign="top">
                        <td><?php echo LAST_NAME; ?>
						</td>
						<td><input type="text" name="last_name" value="<?php echo $umanage['last_name']; ?>" />
						</td>
					</tr>
					<tr valign="top">
                        <td><?php echo EMAIL_ID; ?>
						</td>
						<td><input type="text" name="email" value="<?php echo $umanage['email']; ?>" />
						</td>
					</tr>
					<tr valign="top">
                        <td><?php echo TYPE_OF_ORG; ?>
						</td>
						<td>
							<select name="org_type" class="select_generic"> 
							<?php foreach( $arrData['org_type'] as $org ){?>
								<option <?php if($umanage['code_value']==$org){print('selected');}?> value="<?php echo $org; ?>"><?php echo $org; ?></option>
										<?php }
										?>
							</select>
						</td>
					</tr>
					<tr valign="top">
                        <td><?php echo USER_TYPE; ?>
						</td>
						<td>
							<select name="user_type" class="select_generic"> 
								<option selected value="<?php echo $umanage['user_type']; ?>"><?php echo USER;?></option>
								<option value="0"><?php echo ADMIN;?></option>
							</select>
						</td>
					</tr>
				</tbody>
			</table>
			<input type="button" name="submit" class="submmit_button_generic" value="submit" onclick="send_form(<?php echo $umanage['id'];?>)"/>
		</form>
<?php	
	} else { // end of if start of else
				echo "<strong>".UMSG1."</strong>";
		  } // end of else
?> 
</div>
