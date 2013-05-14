<?php 
/* @author 		 :Shashank Verma
 * @created on   :07-05-2013
 * @desc		 :Create Header 
 ****************Modifed Log ********************************
 *Name			Task			Date			Description
 *			
 *
 ************************************************************	
 *
*/
?>

<html>
	<head>
		<title>Test Scheduler</title>
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>/mainStyle.css">
		
		<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>/dashboard.css">
		<script type="text/javascript" src = "<?php echo JS_PATH;?>jquery-1.8.3.js"></script>
   <script type="text/javascript" src ="<?php echo JS_PATH;?>jScript.js"></script>
   
   <script type="text/javascript" src ="<?php echo JS_PATH;?>genericjs.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH; ?>/jquery.dataTables.css"/>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
        <script type="text/javascript" src = "<?php echo JS_PATH;?>jquery.validate.min.js"></script>
         <script type="text/javascript" src = "http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

    <script src="<?php echo JS_PATH;?>jquery-ui-timepicker-addon.js"></script>
	</head>
	
	<body>      
          <div class="err_display">
           <?php

				
				if(isset($_SESSION['SESS_ERROR'])) {
					echo $_SESSION['SESS_ERROR'];
					unset($_SESSION['SESS_ERROR']);
				}
			?>
			
			</div>
          