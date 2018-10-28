<?php 
$page_title = 'Update Stock';
include ('./header_admin.html');
?>

<head>

	<script src="bs/js/jquery.min.js"></script>
	<script src="bs/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" href="bs/css/bootstrap.min.css">
	
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
		
		.buttonDesignUpload {
			background-color: #acb2ff;
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
	
	<script>
		
		function enable(textID) {
			
			document.getElementById(textID).disabled=false;
		}
		
	</script>
	
	
	
</head>
<body bgcolor="#acb2ff">
	
	<form style="text-align:center" action="update_stock.php" method="post">
		<input type="hidden" name="size" value="1000000">

		<br>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Bootstrap</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;">
		<b>Update new product into database. Fill in the product's information below </b></p>
		
		<br>
		<br>
		
		<div class="form-group">
			
			<div>
				<input type="file" name="image"  class="buttonDesignUpload">
			</div>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>BRAND: </b><input type="text" name="brand" style="padding: 10px 20px;"  class="form-control"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-left:10px;"><b> PRICE: </b><input type="text" name="price" style="padding: 10px 20px;" class="form-control"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-left:10px;"><b> NAME: </b><input type="text" name="name" style="padding: 10px 20px;" class="form-control"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-right:273px;"><b>&emsp;CATEGORY: </b></p>
			
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"  onclick="enable('selectm')"><b>MEN</b>
				  <input type="radio" name="radioGender" value="men">
				  <span class="checkmark"></span>
				</label>
				
				<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;SIZE: </b>
				<select name="size" id="selectm" disabled="disabled">
					<option value="UK 3">UK 5</option>
					<option value="UK 3">UK 6</option>
					<option value="UK 3">UK 7</option>
					<option value="UK 3">UK 8</option>
					<option value="UK 3">UK 9</option>
				</select></p>
				
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"  onclick="enable('selectw')"><b>&emsp;WOMEN</b>
				  <input type="radio" name="radioGender" value="women">
				  <span class="checkmark"></span>
				</label>
				
				<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;SIZE: </b>
				<select name="size" id="selectw" disabled="disabled">
					<option value="UK 3">UK 5</option>
					<option value="UK 3">UK 6</option>
					<option value="UK 3">UK 7</option>
					<option value="UK 3">UK 8</option>
					<option value="UK 3">UK 9</option>
				</select></p>
				
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"  onclick="enable('selectk')"><b>&emsp;KIDS</b>
				  <input type="radio" name="radioGender" value="kids">
				  <span class="checkmark"></span>
				</label>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;SIZE: </b>
				<select name="size" id="selectk" disabled="disabled">
					<option value="UK 3">UK 3</option>
					<option value="UK 3">UK 4</option>
					<option value="UK 3">UK 5</option>
					<option value="UK 3">UK 6</option>
					<option value="UK 3">UK 7</option>
				</select></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-right:90px;"><b>&emsp;&emsp; QUANTITY: </b><input type="text" name="email" style="padding: 10px 20px;" class="form-control"></p>
			
			
			
			<p><input type="submit" class="buttonDesign" name="submit" value="Upload"></p>
			<input type="hidden" name="submitted" value="TRUE">
			
		</div>
		
	</form>
	
</body>