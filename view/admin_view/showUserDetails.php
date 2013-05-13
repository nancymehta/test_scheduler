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


		      <div class="contact-strip bg-mid-gray">Edit profile
</div>
<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)){
?>
		<form id="send">
		<table class="table-generic">
  			<tbody>
               			<?php 
				$umanage=$arrData[0];
				?>
				<tr valign="top">
                        		<td><?php echo "User Name: "; ?>
					</td>
					<td><input type="text" name="username" value="<?php echo $umanage['username']; ?>" />
					</td>
				</tr>
				<tr valign="top">
                        		<td><?php echo "Password: "; ?>
					</td>
					<td><input type="text" name="password" value="<?php echo $umanage['password']; ?>" />
					</td>
				</tr>
				<tr valign="top">
                        		<td><?php echo "Type Of User: "; ?>
					</td>
					
					<td>
					<select name="user_type" class="select_generic"> 
						<option selected value="<?php echo $umanage['user_type']; ?>">USER</option>
						<option value="0">ADMIN</option>
					</select>
					</td>
				</tr>
				
				<tr valign="top">
                        		<td><?php echo "First Name: "; ?>
					</td>
					<td><input type="text" name="first_name" value="<?php echo $umanage['first_name']; ?>" />
					</td>
				</tr>
				<tr valign="top">
                        		<td><?php echo "Last Name: "; ?>
					</td>
					<td><input type="text" name="last_name" value="<?php echo $umanage['last_name']; ?>" />
					</td>
				</tr>
				<tr valign="top">
                        		<td><?php echo "Email ID: "; ?>
					</td>
					<td><input type="text" name="email" value="<?php echo $umanage['email']; ?>" />
					</td>
				</tr>
				<tr valign="top">
                        		<td><?php echo "Type Of Organisation: "; ?>
					</td>
					<td>
					<select name="org_type" class="select_generic"> 
					<?php foreach($arrData['org_type'] as $org){?>
						<option <?php if($umanage['code_value']==$org){print('selected');}?> value="<?php echo $org; ?>"><?php echo $org; ?></option>
					<?php }
					?>
						
					</select>
					</td>
				</tr>

			</tbody>
		</table>
		<input type="button" name="submit" class="submmit_button_generic" value="submit" onclick="send_form(<?php echo $umanage['id'];?>)"/>
		</form>
	<?php	
		} else { // end of if start of else
				echo "<strong>"."NO RECORDS FOUND"."</strong>";
		  } // end of else
	?> 
	</div>
