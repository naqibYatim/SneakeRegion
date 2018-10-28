<?php 

	// start the session
	session_start();
	
	$page_title = 'Sign Up Page';
	include ('./header.html');
	
	if(isset($_POST['submitted'])){
		
		if(isset($_SESSION['id'])){
			
			//echo 'Id: ' . $_SESSION['id'];
			$id = $_SESSION['id'];
			echo '<p>You have already login. Please logout to sign up on different account</p>';
			
		}else{
			
			// "require_once" check if the file has already been included, and if so, not include (require) it again
			require_once('connect.php');
			
			// declare the array of errors
			$errors = array();
			
			// validate the form
			if(empty($_POST['name'])){
				$errors[] = 'You forgot to enter your name';
			}else{
				$name = $_POST['name'];
			}
			
			if(empty($_POST['username'])){
				$errors[] = 'You forgot to enter your username';
			}else{
				$username = $_POST['username'];
			}
			
			if(empty($_POST['password'])){
				$errors[] = 'You forgot to enter your password';
			}else{
				$password = $_POST['password'];
			}
			
			if(empty($_POST['phone'])){
				$errors[] = 'You forgot to enter your phone number';
			}else{
				$phone = $_POST['phone'];
			}
			
			if(empty($_POST['address'])){
				$errors[] = 'You forgot to enter your address';
			}else{
				$address = $_POST['address'];
			}
			
			if(empty($_POST['email'])){
				$errors[] = 'You forgot to enter your email';
			}else{
				$email = $_POST['email'];
			}
			
			$gender = $_POST['radioGender'];
			
			// if no error occured
			if(empty($errors)){
				
				$query = "SELECT cust_id FROM customer WHERE cust_email='$email'";
				// "mysqli_query" performs a query against the database.
				$result = mysqli_query($dbc, $query);
				
					// "mysqli_num_rows" returns the number of rows in a result set
				if(mysqli_num_rows($result) == 0){
					
					$query = "INSERT INTO customer (cust_name, cust_username, cust_password, cust_phone, cust_email, cust_address, cust_gender, registration_date)
								VALUES('$name', '$username', SHA('$password'), '$phone', '$email', '$address', '$gender', NOW())";
					$result = mysqli_query($dbc, $query);
					
					if($result){
						
						$query = mysqli_query($dbc, 'SELECT * FROM customer WHERE customer.cust_username="' . $username . '" and customer.cust_password=SHA("' . $password . '")');
						while($row = mysqli_fetch_array($query)){
							$id = $row['cust_id'];
						}
						
						// Set session variables  username
						$_SESSION['id'] = $id;
						$_SESSION['username'] = $username;
						
						echo 'Id: ' . $_SESSION['id'];
						echo "<br>";
						
					}
					
				}else{
					echo '<h2>Error!</h2>
							<p id="error">This account has already registered in the database</p>';
				}
				
			}else{
				
				echo '<h2>Error!</h2>
						<p id="error">The following error(s) occured:<br/></p>';
				foreach($errors as $msg){
					echo " - $msg<br/>";
				}
				echo '<p><b>Please fill in your information again</b></p>';
				
			}
			// "mysqli_close" closes a previously opened database connection
			mysqli_close($dbc);
			
		}
		
	}

?>
	
<head>
	<style>
		
		/******************************************* Button design ***************************************************/
		
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
		
		/******************************************* Button design ***************************************************/
		
		/*************************************** Box background layout ***********************************************/
		
		.box{
			background:#bcc0fd;
			width:500px;
			border-radius:6px;
			margin: 0 auto 0 auto;
			padding:30px 0px 30px 0px;
			border: #2980b9 4px solid; 
		}
		
		/*************************************** Box background layout ***********************************************/
		
		/******************************************* Radio button ****************************************************/
		
		/* The container */
		.container {
			display: block;
			position: relative;
			padding-left: 15px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 22px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default radio button */
		.container input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
			position: absolute;
			top: 0;
			left: 200;
			height: 25px;
			width: 25px;
			background-color: #eee;
			border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.container:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.container input:checked ~ .checkmark {
			background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.container input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the indicator (dot/circle) */
		.container .checkmark:after {
			top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}
		
		/******************************************* Radio button ****************************************************/
		
		/******************************************* Error id red ****************************************************/
		
		#error {
			color: red;
		}
		
		/******************************************* Error id red ****************************************************/
		
	</style>
</head>

<body bgcolor="#acb2ff">

	<form style="text-align:center" action="signup.php" method="post">

		<br>
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Create a New Account</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;">
		<b>Come join the SneakeRegion community! Let's set up your account. Already have one? </b><a href="login.php">Sign in here</a></p>
		
		<br>
		<br>
		
		<div class="box">
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>FULL NAME: </b><input type="text" name="name" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>USERNAME: </b><input type="text" name="username" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>PASSWORD: </b><input type="password" name="password" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;&emsp;PHONE: </b><input type="text" name="phone" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;ADDRESS: </b><input type="text" name="address" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;&emsp; EMAIL: </b><input type="text" name="email" style="padding: 10px 20px;"></p>
			
			<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; margin-right:15px;"><b>MALE&emsp;</b>
			  <input type="radio" checked="checked" name="radioGender" value="male">
			  <span class="checkmark"></span>
			</label>
			
			<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; margin-right:35px;"><b>FEMALE&emsp;</b>
			  <input type="radio" name="radioGender" value="female">
			  <span class="checkmark"></span>
			</label>
			
			<p><input type="submit" class="buttonDesign" name="submit" value="Sign Up"></p>
			<input type="hidden" name="submitted" value="TRUE">
			
		</div>
		
	</form>

</body>
	
	