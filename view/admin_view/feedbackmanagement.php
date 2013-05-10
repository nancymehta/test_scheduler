<div>
	<table>
	<tr>
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
	<?php if($arrData){
		?>
		<?php 
		foreach($arrData as $value){
			echo "<tr>";
			echo "<td>";
			echo $value['name'];
			echo "</td>";
			echo "<td>";
			echo $value['email'];
			echo "</td>";
			echo "<td>";
			echo $value['description'];
			echo "</td>";
			echo "<td id='nano'>";
			echo "<a id='heeelo' href='#'>Reply</a>";
			echo "</td>";
			echo "</tr>";
		
		}
	}?>
	
	</table>	
</div>
<script>
	$("a").click(function(event){
		$("#nano").html("<input type='text' name='' id='' />");
	});
</script>