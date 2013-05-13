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
<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div class = "um">
<?php 
	if(isset($arrData) && !empty($arrData)){
?>
		<table width="89%" border="1" cellpadding="0" cellspacing="0" >
			<thead>
				<tr style="background-color:#666666; color:#FFFFFF" valign="top">
					<th style="font-size:13px" align="left"><?php echo "User Id";?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "User Name"; ?>
					</th>
					<th style="font-size:13px" align="left"><?php echo "Options"; ?>
					</th>   
				<tr>
			</thead>
  			<tbody>
               			<?php 
				foreach($arrData as $umanage){ 
				?>
					<tr valign="top">
                        			<td><?php echo $umanage['id']; ?></td>
						<td><?php echo $umanage['username']; ?></td>
						<td><a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'EDIT')">EDIT</a> <a href="#" onClick="submit1(<?php echo $umanage['id']; ?>,'DELETE')">DELETE</a></td>
					</tr>
				<?php 
				} // end of foreach
				?>
			</tbody>
		</table>
	<?php	
		} else { // end of if start of else
				echo "<strong>"."NO RECORDS FOUND"."</strong>";
		  } // end of else
	?> 
	</div>

</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>

