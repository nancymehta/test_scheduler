<?php
//echo "THIS IS LOGIN";
?>

<html>
	<head>
		<title>Sample for Login View</title>
		<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery-1.8.3.js"></script>
		<script type="text/javascript">
			function loginx()
			{
// 				alert('hi');
//  				alert($("#frmLogin").serialize());
				$.ajax({
					type:"POST",
					url:"index_main.php?controller=main&function=singleLoginLogin",
					data:$("#frmLogin").serialize(),
					success:function(result){
					alert(result);
// 					location.reload();
					}
					});//ajax function ends here
			}
		</script>
	</head>
	<body>
		<form action="" id="frmLogin">
			User Name : <input type="text" name="userName"><br/>
			Password  : <input type="text" name="password"><br/>
			
			<input type="button" value="Login" onclick="loginx()">
		</form>
	</body>
</html>