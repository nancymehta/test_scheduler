
<div>	   
			<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>
			    <p align='center'><span style='font-size: 8.5pt; color: #333333'><b>
			    <span style='font-family: Verdana'>&nbsp;&nbsp;&nbsp;
			    <a  href='<?php echo SITE_PATH;?>index.php?controller=adminhome&function=loadAdminHome'>Click To Go back</a>&nbsp;&nbsp;&nbsp;&nbsp; 
			    &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
			    </span></b></span></td>
			  </tr>
			</table>
 <?php
$row=$arrData;
//echo '<pre>';
//print_r($row);
//print_r($row[])
$totalOptions=count($row['option']['id']);

?>
	
			<form name='f1' action="<?php  echo SITE_PATH; ?>questionBank/quesUpdate?qid=<?php echo $row['id'];?>&totalOPtion=<?php echo $totalOptions; ?>" method='post'>  		
 	    	<table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber1'>
			  <tr>
			    <td width='100%' colspan='2'>Question Id :&nbsp;<?php echo $row["id"]; ?></td>
			  </tr>
			  <tr>
			    <td width='100%' colspan='2'><textarea rows='6' name='question' class="max-length" cols='57'><?php echo $row["question"]; ?></textarea></td>
			  </tr>
			     <tr><td>Options are:</td></tr>
			  <?php for($i=0;$i<$totalOptions;$i++){   ?>
			  <tr><td>
				<?php 
				         if(in_array($row['option']['id'][$i],$row['answer']['id'])){   ?>
				      
				          <input type='checkbox' name='ans[<?php echo $row['option']['id'][$i]; ?>]'  checked />
				     <?php } else{ ?>
				          <input type='checkbox' name='ans[<?php echo $row['option']['id'][$i]; ?>]'/>
					<?php  } ?>
			 </td>	     
			    <td width='54%'><?php echo $i+1; ?>:<input type='text' class="max-length" name="option<?php echo $i+1; ?>" value='<?php echo $row['option']['option'][$i]; ?>' size='20'></td>
			  
			  </tr>
			  
		<?php  }?>
			  
			  
			    <tr>
			    <td width='54%'>Correct Answer :All the options that is defined as true answer is checked</td>
			    <td width='46%'>
			    </td>
			  </tr>
			
		
			  <tr>
			    <td width='100%' colspan='2' rowspan='3'>
				    <p align='center'>&nbsp;&nbsp;&nbsp;
				    <input type='submit' value='Update' name='btnupdatequestion'>
			    </td>
			  </tr>
			</table></center>
		</form>
		
		<center>	
		  <table border='1' cellpadding='2' cellspacing='0' style='border-collapse: collapse' bordercolor='#111111' width='100%' id='AutoNumber2'>
			  <tr>
			    <td width='100%' bgcolor='#999966'>&nbsp; </td>
			  </tr>
			</table>
			</center>
	    </div>
	  </div>

