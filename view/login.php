<?php
//echo "THIS IS LOGIN";
?>

<html>
	<head>
		<title>Sample for Login View</title>
		<script type="text/javascript" src="<?php echo JS_PATH; ?>jquery-1.8.3.js"></script>
		<script type="text/javascript">
			function login()
			{
// 				alert('hi');
//  				alert($("#frmLogin").serialize());
				$.ajax({
					type:"POST",
					url:"index_main.php?controller=main&function=login",
					data:$("#frmLogin").serialize(),
					success:function(result){
						$("#result").html(result);
// 					location.reload();
					}
					});//ajax function ends here
			}
			function test_login()
			{
				$.ajax({
					type:"POST",
					url:"index_main.php?controller=main&function=singleLoginLogic",
					data:$("#frmLogin").serialize(),
					success:function(result){
					$("#result").html(result);
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
			
			<input type="button" value="Login" onclick="login()">
		</form>
		<input type="button" value="TEST LOGIN" onclick="test_login()">
		<div id="result"></div>
	</body>
</html>