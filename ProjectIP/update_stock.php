<?php 
		
	$page_title = 'Update Stock';
	include ('./header_admin.html');
	
	if(isset($_POST['submit'])){
		
		require_once('connect.php');
		
		$errors = array();
		
		
		// start the validation
		if(empty($_FILES['image']['name'])){
			$errors[] = "Product's image must be selected";
		}else{
			// get the submitted image file
			$image = $_FILES['image']['name'];
		}
		
		
		if(!isset($_POST['brand'])){
			$errors[] = 'Brand must be selected';
		}else{
			$brand = $_POST['brand'];
		}
		
		if(empty($_POST['price'])){
			$errors[] = 'Price must be specified';
		}else{
			$price = $_POST['price'];
		}
		
		if(empty($_POST['name'])){
			$errors[] = "Product's name must be specified";
		}else{
			$name = $_POST['name'];
		}
		
		if(!isset($_POST['radioCategory'])){
			$errors[] = "Product's category must be selected";
		}else{
			$category = $_POST['radioCategory'];
		}
		
		if(isset($_POST['sizes'])){
			$sizes = $_POST['sizes'];
		}else{
			$sizes = NULL;
			echo "<p><b>You forgot to choose your size</b></p>";
		}
		
		if(!empty($_POST['quantity'])){
			$quantity = $_POST['quantity'];
		}else{
			$quantity = NULL;
			echo "<p><b>You forgot to enter quantity</b></p>";
		}
		
		
		/*
		if(!isset($_POST['size'])){
			$errors[] = "Product's size must be selected";
		}else{
			$size = $_POST['size'];
		}
		
		
		
		if(empty($_POST['quantity'])){
			$errors[] = "Amount of product's quantity must be entered";
		}else{
			$quantity = $_POST['quantity'];
		}
		*/
		
		
		if(empty($errors)){
			
			/*
			echo $brand;
			echo '<br>';
			echo $price;
			echo '<br>';
			echo $name;
			echo '<br>';
			echo $category;
			echo '<br>';
			//echo $size;
			//echo '<br>';
			echo $quantity;
			echo '<br>';
			*/
			// get the submitted image file
			//$image = $_FILES['image']['name'];
			
			$max = count($sizes);
			
			for($i = 0; $i < $max; $i++){
				
				/*
				echo "Sizes: ".$sizes[$i];
				echo "<br>";
				echo "Quantity: ".$quantity[$i];
				echo "<br>";
				echo "<br>";
				*/
				
				$query = "INSERT INTO product (pd_image, pd_brand, pd_price, pd_name, pd_quantity, pd_category, pd_size)
							VALUES ('$image', '$brand', '$price', '$name', '$quantity[$i]', '$category', '$sizes[$i]')";
				$result = mysqli_query($dbc, $query);
				
			}
			
			
			// path to store the uploaded image
			$target = "shoes/".basename($_FILES['image']['name']);
			
			// Move the uploaded image into the folder "shoes"
			if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
				$msg = "Image uploaded successfully";
			}else{
				$msg = "There was a problem in uploading image";
			}
			
			if($result){
				echo "New product have been added";
			}
			/*
			$query = "INSERT INTO product (pd_image, pd_brand, pd_price, pd_name, pd_quantity, pd_category)
						VALUES ('$image', '$brand', '$price', '$name', '$quantity', '$category')";
			$result = mysqli_query($dbc, $query);
			*/
			
		}else{
			
			echo '<h2>Error!</h2>
					<p id="error">The following error(s) occured:<br/></p>';
			foreach($errors as $msg){
				echo " - $msg<br/>";
			}
			echo "<p><b>Please enter the product's description again</b></p>";
			
		}
		mysqli_close($dbc);
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
			
			if(textID == 'selectm'){
				document.getElementById(textID).disabled=false;
				document.getElementById('selectm').hidden=false;
				document.getElementById('sizem').hidden=false;
				document.getElementById('selectw').hidden=true;
				document.getElementById('sizew').hidden=true;
				document.getElementById('selectk').hidden=true;
				document.getElementById('sizek').hidden=true;
			}else if(textID == 'selectw'){
				document.getElementById(textID).disabled=false;
				document.getElementById('selectw').hidden=false;
				document.getElementById('sizew').hidden=false;
				document.getElementById('selectm').hidden=true;
				document.getElementById('sizem').hidden=true;
				document.getElementById('selectk').hidden=true;
				document.getElementById('sizek').hidden=true;
			}else if(textID == 'selectk'){
				document.getElementById(textID).disabled=false;
				document.getElementById('selectk').hidden=false;
				document.getElementById('sizek').hidden=false;
				document.getElementById('selectm').hidden=true;
				document.getElementById('sizem').hidden=true;
				document.getElementById('selectw').hidden=true;
				document.getElementById('sizew').hidden=true;
			}else{
				document.getElementById('selectk').hidden=true;
				document.getElementById('sizek').hidden=true;
				document.getElementById('selectm').hidden=true;
				document.getElementById('sizem').hidden=true;
				document.getElementById('selectw').hidden=true;
				document.getElementById('sizew').hidden=true;
			}
			
			
		}
		
		function enableText(checkBool, textID){
			
			textFldObj = document.getElementById(textID);
			//Disable the text field
			textFldObj.disabled = !checkBool;
			//Clear value in the text field
			if (!checkBool) { textFldObj.value = ''; }
		}
		
	</script>
	
</head>
<body bgcolor="#acb2ff" onload="enable('else')">
	
	<form style="text-align:center" action="update_stock.php" method="post" enctype="multipart/form-data">
	
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:30px;"><b>Update new stock</b></p>
		
		<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;">
		<b>Update new product into database. Fill in the product's information below </b></p>
		
		<br>
		<br>
		
		<div class="box">
			
			<div>
				<input type="file" name="image"  class="buttonDesignUpload">
			</div>
			
			<p id="brand" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-right:90px;"><b>BRAND: </b>
				<select name="brand" id="brand" style="font-size:18px">
					<option value="ADIDAS">ADIDAS</option>
					<option value="NIKE">NIKE</option>
					<option value="PUMA">PUMA</option>
					<option value="CONVERSE">CONVERSE</option>
					<option value="ASICS">ASICS</option>
					<option value="VANS">VANS</option>
				</select></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-left:10px;"><b> PRICE: </b><input type="text" name="price" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-left:10px;"><b> NAME: </b><input type="text" name="name" style="padding: 10px 20px;"></p>
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-right:273px;"><b>&emsp;CATEGORY: </b></p>
			
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>MEN</b>
				  <input type="radio" name="radioCategory" value="men" onclick="enable('selectm')">
				  <span class="checkmark"></span>
				</label>
				
				<div id="selectm" disabled="disabled">
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:30px;"><b>SIZE:&emsp;&emsp;&emsp;&emsp;QUANTITY:</b></p>
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 5" onclick="enableText(this.checked, 'quantity1');">UK 5
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity1" size="5" disabled="disabled"></p>
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 6" onclick="enableText(this.checked, 'quantity2');">UK 6
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity2" size="5" disabled="disabled"></p>
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 7" onclick="enableText(this.checked, 'quantity3');">UK 7
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity3" size="5" disabled="disabled"></p>
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 8" onclick="enableText(this.checked, 'quantity4');">UK 8
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity4" size="5" disabled="disabled"></p>
					
					<p id="sizem" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 9" onclick="enableText(this.checked, 'quantity5');">UK 9
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity5" size="5" disabled="disabled"></p>
					
				</div>
				
				<!--
				<select name="size" id="selectm" disabled="disabled" style="font-size:18px">
					<option value="UK 5">UK 5</option>
					<option value="UK 6">UK 6</option>
					<option value="UK 7">UK 7</option>
					<option value="UK 8">UK 8</option>
					<option value="UK 9">UK 9</option>
				</select></p>
				-->
			
				
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;WOMEN</b>
				  <input type="radio" name="radioCategory" value="women" onclick="enable('selectw')">
				  <span class="checkmark"></span>
				</label>
				
				<div id="selectw" disabled="disabled">
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:30px;"><b>SIZE:&emsp;&emsp;&emsp;&emsp;QUANTITY:</b></p>
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 5" onclick="enableText(this.checked, 'quantity6');">UK 5
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity6" size="5" disabled="disabled"></p>
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 6" onclick="enableText(this.checked, 'quantity7');">UK 6
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity7" size="5" disabled="disabled"></p>
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 7" onclick="enableText(this.checked, 'quantity8');">UK 7
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity8" size="5" disabled="disabled"></p>
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 8" onclick="enableText(this.checked, 'quantity9');">UK 8
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity9" size="5" disabled="disabled"></p>
					
					<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 9" onclick="enableText(this.checked, 'quantity10');">UK 9
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity10" size="5" disabled="disabled"></p>
					
				</div>
				
				<!--
				<p id="sizew" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;SIZE: </b>
				<select name="size" id="selectw" disabled="disabled" style="font-size:18px">
					<option value="UK 5">UK 5</option>
					<option value="UK 6">UK 6</option>
					<option value="UK 7">UK 7</option>
					<option value="UK 8">UK 8</option>
					<option value="UK 9">UK 9</option>
				</select></p>
				-->
				
				
				<label class="container" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>KIDS</b>
				  <input type="radio" name="radioCategory" value="kids" onclick="enable('selectk')">
				  <span class="checkmark"></span>
				</label>
			
				<div id="selectk" disabled="disabled">
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:30px;"><b>SIZE:&emsp;&emsp;&emsp;&emsp;QUANTITY:</b></p>
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 2" onclick="enableText(this.checked, 'quantity11');">UK 2
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity11" size="5" disabled="disabled"></p>
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 3" onclick="enableText(this.checked, 'quantity12');">UK 3
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity12" size="5" disabled="disabled"></p>
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 4" onclick="enableText(this.checked, 'quantity13');">UK 4
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity13" size="5" disabled="disabled"></p>
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 5" onclick="enableText(this.checked, 'quantity14');">UK 5
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity14" size="5" disabled="disabled"></p>
					
					<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:15px; padding-right:35px;">
					<input type="checkbox" name="sizes[]" id="myCheckBox" value="UK 6" onclick="enableText(this.checked, 'quantity15');">UK 6
					&emsp;&emsp;&emsp; <input type="text" name="quantity[]" id="quantity15" size="5" disabled="disabled"></p>
					
				</div>
			
				<!--
				<p id="sizek" style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px;"><b>&emsp;SIZE: </b>
				<select name="size" id="selectk" disabled="disabled" style="font-size:18px">
					<option value="UK 3">UK 3</option>
					<option value="UK 4">UK 4</option>
					<option value="UK 5">UK 5</option>
					<option value="UK 6">UK 6</option>
					<option value="UK 7">UK 7</option>
				</select></p>
			
			
			
			<p style="color:#020f85; font-family:Arial Narrow, sans-serif; font-size:20px; padding-right:80px;"><b>&emsp;&emsp; QUANTITY: </b><input type="text" name="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity'];?>" style="padding: 10px 20px;"></p>
			-->
			<br>
			
			<p><input type="submit" class="buttonDesign" name="submit" value="Upload"></p>
			<input type="hidden" name="submitted" value="TRUE">
			
		</div>
		
	</form>
	
	<a href="form.php">change form</a>
	
</body>