<?php
	
	// start the session
	session_start();
	
	if(isset($_SESSION['id'])){
			
			$id = $_SESSION['id'];
			
	}
	
	if(isset($_POST['submitted'])){
		
		if(isset($_SESSION['id'])){
			
			$id = $_SESSION['id'];
			
		}
		
		if(isset($_POST['name'])){
			$name1 = $_POST['name'];
			//echo $id;
			//echo $name1;
			//echo "<br>";
			require_once 'connect.php';
			$query2 = "UPDATE customer SET cust_name='". $name1 ."' WHERE cust_id=". $id ."";		
			$result2 = mysqli_query($dbc, $query2);
		}
		
		if(isset($_POST['username'])){
			$username1 = $_POST['username'];
			//echo $username;
			//echo "<br>";
			require_once 'connect.php';
			$query3 = "UPDATE customer SET cust_username='". $username1 ."' WHERE cust_id=". $id ."";		
			$result3 = mysqli_query($dbc, $query3);
		}
		
		if(isset($_POST['phone'])){
			$phone1 = $_POST['phone'];
			//echo $phone;
			//echo "<br>";
			require_once 'connect.php';
			$query4 = "UPDATE customer SET cust_phone='". $phone1 ."' WHERE cust_id=". $id ."";		
			$result4 = mysqli_query($dbc, $query4);
		}
		
		if(isset($_POST['address'])){
			$address1 = $_POST['address'];
			//echo $address;
			//echo "<br>";
			require_once 'connect.php';
			$query5 = "UPDATE customer SET cust_address='". $address1 ."' WHERE cust_id=". $id ."";		
			$result5 = mysqli_query($dbc, $query5);
		}
		
		if(isset($_POST['email'])){
			$email1 = $_POST['email'];
			//echo $email;
			//echo "<br>";
			require_once 'connect.php';
			$query6 = "UPDATE customer SET cust_email='". $email1 ."' WHERE cust_id=". $id ."";		
			$result6 = mysqli_query($dbc, $query6);
		}
		
		if(isset($_POST['radioGender'])){
			$radioGender1 = $_POST['radioGender'];
			//echo $radioGender;
			//echo "<br>";
			require_once 'connect.php';
			$query7 = "UPDATE customer SET cust_gender='". $radioGender1 ."' WHERE cust_id=". $id ."";		
			$result7 = mysqli_query($dbc, $query7);
		}
		
	}
	
?>

<head>
	<title>Edit your profile</title>
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
	
	<?php
		
		require_once 'connect.php';
			
		$query = "SELECT * FROM customer WHERE customer.cust_id=". $id."";
		$result = mysqli_query($dbc, $query);
		
		while($row = mysqli_fetch_array($result)){
		
			$fullname = $row['cust_name'];
			$username = $row['cust_username'];
			$phone = $row['cust_phone'];
			$address = $row['cust_email'];
			$email = $row['cust_address'];
			$gender = $row['cust_gender'];
			
		}
	
		
	?>
	
	<form style="text-align:center" action="edit_profile.php" method="post">

		<br>
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Edit your account details</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;">
		<b>Update your account details by inserting your new updated data into the related text field. Click update button after you have made your changes.<br> Click </b><a href="index.php">here</a><b> to navigate back to home page</b></p>
		
		<br>
		<br>
		
		<div class="box">
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>FULL NAME: </b><input type="text" name="name" value="<?php echo "$fullname"; ?>" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>USERNAME: </b><input type="text" name="username" value="<?php echo "$username"; ?>" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;&emsp;PHONE: </b><input type="text" name="phone" value="<?php echo "$phone"; ?>" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;ADDRESS: </b><input type="text" name="address" value="<?php echo "$address"; ?>" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;&emsp; EMAIL: </b><input type="text" name="email" value="<?php echo "$email"; ?>" style="padding: 10px 20px;"></p>
			
			<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; margin-right:15px;"><b>&emsp;MALE</b>
			  <input type="radio" name="radioGender" value="male" <?php echo ($gender== 'male') ?  "checked" : "" ;  ?>/>
			  <span class="checkmark"></span>
			</label>
			
			<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; margin-right:35px;"><b>&emsp;&emsp;&emsp;FEMALE</b>
			  <input type="radio" name="radioGender" value="female" <?php echo ($gender== 'female') ?  "checked" : "" ;  ?>/>
			  <span class="checkmark"></span>
			</label>
			
			<p><input type="submit" class="buttonDesign" name="submit" value="Update"></p>
			<input type="hidden" name="submitted" value="TRUE">
			
		</div>
		
	</form>

</body>