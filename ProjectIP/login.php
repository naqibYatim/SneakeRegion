<?php 
	
	// start the session
	session_start();
	
	$page_title = 'Login Page';
	include ('./header.html');
	
	if(isset($_POST['buttonLogin'])){
		
		if(isset($_SESSION['id'])){
			
			//echo 'Id: ' . $_SESSION['id'];
			$id = $_SESSION['id'];
			echo '<p>You have already login. Please logout first if you intended on using another account</p>';
			
		}else{
			
			require 'connect.php';
		
			$username = $_POST['username'];
			$password = $_POST['password'];
			
			$result = mysqli_query($dbc, 'SELECT * FROM customer WHERE customer.cust_username="' . $username . '" and customer.cust_password=SHA("' . $password . '")');
			
			if(mysqli_num_rows($result) == 1){
				
				while($row = mysqli_fetch_array($result)){
					$id = $row['cust_id'];
				}
				
				// Set session variables
				$_SESSION['username'] = $username;
				$_SESSION['id'] = $id;
				
			}else{
				echo 'Invalid account';
			}
			mysqli_close($dbc);
			
		}
		
	}
	
?>

<head>
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
			padding:30px 0px 30px 0px;
			border: #2980b9 4px solid; 
		}
		
	</style>
</head>

<body bgcolor="#acb2ff">

	<form style="text-align:center" action="login.php?action=login" method="post">

		<br>
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Login Into Your Account</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>Enter username and password to login</b></p>
		<br>
		<br>
		
		<div class="box">
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>USERNAME</b></p>
			<p><input type="text" name="username" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>PASSWORD</b></p>
			<p><input type="password" name="password" style="padding: 10px 20px;"></p>
			
			<p><input type="submit" class="buttonDesign" value="Login" name="buttonLogin"></p>
			
			<p><a href="signup.php">Sign up here</a></p>
			
		</div>
		
	</form>

</body>