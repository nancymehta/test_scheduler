<div class="bigmid" >
<div class="midpanel" >

<!-- midpanel Content gooes here  -->

<div>

	<?php	

	if(isset($arrData) && !empty($arrData)){
	?>
	<table class="table-generic">
		<tr>
			<th>
				id
			</th>
			<th>
				Name
			</th>
			<th>
				Email
			</th>
			<th>
				Description
			</th>
		</tr>
	<?php 	
		$i=0;
		foreach($arrData as $value){
		$i++;
	?>
		<tr>
			<td>
				<?php echo $value['id'];?>
			</td>
			
			<td>
				<?php echo $value['name'];?>
			</td>
				<td>
					<?php echo $value['email'];?>
				</td>
				<td>
					<?php echo $value['description'];?>
				</td>
				<td class="text<?php echo $i; ?>">
						<a href="#" class="submmit_button_generic" onClick="submit(<?php echo $value['id']; ?>)">Reply</a>
				</td>
				
		</tr>
		
	<?php }?>
	</table>
	<?php }?>
	
	
</div>

</div>
<div class="midright">

<!-- right content goes here -->
</div>

</div>
