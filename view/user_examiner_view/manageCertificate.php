<?php
/* @author 		 :Ashwani Singh	
*  @created on   :09-05-2013
*  @desc		 :Controller to create a test.
*********************************************Modifed Log ********************************
*Name				Task						Date			Description
*
*
********************************************************************************************
*
*/
?>


<div id="certificate" >
	<h3> Create New Certificate </h3>
	<form  id="manageCertificate" name="manageCertificate" action="<?php echo SITE_PATH.'/createTest/createCertificate'; ?>" method="post" enctype="multipart/form-data">
		<table >
			<tr><td><?php echo 'Certificate Name'; ?>:<input type="text" id="certificateName" name="certificateName" /> </td></tr>
			<tr><td><?php ?><input type="file" id="certificate" name="certificate"/></td></tr>
			<tr><td><?php ?><input type="submit" value="Upload"/></td></tr>								
		</table>  			       		
	</form>
</div>







