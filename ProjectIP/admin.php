<?php 
	
	// start the session
	session_start();
	
	//$page_title = 'Admin Page';
	//include ('./header.html');
	
	/*
	if(isset($_SESSION['username'])){
		echo 'Welcome ' . $_SESSION['username'];
	}
	*/
	
	if(isset($_POST['buttonLoginAdmin'])){
		
		require 'connect.php';
		
		$adminusername = $_POST['adminusername'];
		$adminpassword = $_POST['adminpassword'];
		
		$result = mysqli_query($dbc, 'SELECT * FROM admin WHERE admin.adm_username="' . $adminusername . '" and admin.adm_password="' . $adminpassword . '"');
		
		if(mysqli_num_rows($result) == 1){
			
			// sends a raw HTTP header to a client (redirect to another page)
			header('Location:check_order.php');
			
		}else{
			echo 'Invalid account';
		}
		mysqli_close($dbc);
	}
	
?>

<html>

<head>
	<title>Admin Page</title>
	<style>
		
		.buttonDesign {
			background-color: #4367e7;
			border: none;
			color: white;
			padding: 15px 42px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
		.box{
			background:#bcc0fd;
			width:300px;
			border-radius:6px;
			margin: 0 auto 0 auto;
			padding:30px 0px 40px 0px;
			border: #2980b9 4px solid; 
		}
		
	</style>
</head>

<body bgcolor="#acb2ff">

	<form style="text-align:center" action="admin.php" method="post">

		<br>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Login as Admin</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>Please enter your admin's username and password</b></p>
		
		<br>
		<br>
		
		<div class="box">
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>USERNAME</b></p>
			<p><input type="text" name="adminusername" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>PASSWORD</b></p>
			<p><input type="password" name="adminpassword" style="padding: 10px 20px;"></p>
			
			<p><input type="submit" class="buttonDesign" name="buttonLoginAdmin" value="Login"></p>
			
		</div>
		
	</form>

</body>

</html>