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
		
		#content{
			width: 50%;
			margin: 20px auto;
			border: 1px solid #cbcbcb;
			background-color: #cfd2ff;
		}
		
		#img_div{
			width: 80%;
			padding: 5px;
			margin: 15px auto;
			border: 1px solid #cbcbcb;
			background-color: #edeeff;
		}
		#img_div:after{
			content: "";
			display: block;
			clear: both;
		}
		#shoes_img{
			float: left;
			margin: 5px;
			width: 200px;
			height: 140px;
		}
		
		#demoFont {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 30px;
			letter-spacing: -0.8px;
			word-spacing: 2px;
			color: #092666;
			font-weight: 400;
			text-align:center;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: none;
		}
		
		#demoFont2 {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 20px;
			letter-spacing: -0.8px;
			word-spacing: 2px;
			color: #092666;
			font-weight: 400;
			text-align:center;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: none;
		}
		
		#demoFont3 {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 25px;
			letter-spacing: -0.8px;
			word-spacing: 2px;
			color: #092666;
			font-weight: 400;
			text-align:center;
			text-decoration: none;
			font-style: normal;
			font-variant: normal;
			text-transform: none;
		}
		
	</style>
	<title>Confirm Order</title>
</head>
<?php 
	
	// start the session
	session_start();
	
	if(isset($_SESSION['id'])){
		
		//echo 'Id: ' . $_SESSION['id'];
		$id = $_SESSION['id'];
		
		$cust_id = $_SESSION['id'];
		
		if(isset($_POST['submit'])){
		
			// connect to database
			require_once('connect.php');
			
			// execute query
			$query = "SELECT * FROM customer WHERE customer.cust_id=". $cust_id ."";
			$result = mysqli_query($dbc, $query);
			
			// fetch the data
			while($row = mysqli_fetch_array($result)){
					
				$cust_name = $row['cust_name'];
				$cust_username = $row['cust_username'];
				$cust_phone = $row['cust_phone'];
				$cust_email = $row['cust_email'];
				$cust_address = $row['cust_address'];
				
			}
			
			echo "<div id='demoFont'>Thank you for purchasing our product, ". $cust_username ."</div>";
			echo "<div id='demoFont2'><p><b>Here is your details </b></p>
					<p>Full Name: ". $cust_name ."</p>
					<p>Phone Number: ". $cust_phone ."</p>
					<p>Address: ". $cust_email ."</p>
					<p>Email: ". $cust_address ."</p></div>";
			
			echo "<br>";
			echo "<div id='demoFont3'><p><b>List item(s) of your purchase: </b></p></div>";
			
			$query = "SELECT * FROM cart";
			$result = mysqli_query($dbc, $query);
			
			echo "<form action='index.php' method='post' enctype='multipart/form-data'>";
				
				echo "<div id='content'>";
				
					// "mysqli_num_rows" returns the number of rows in a result set
				$numarr = mysqli_num_rows($result);
				
				// selected size array
				$size = array();
				$size = $_POST['cart_size'];
				
				$count = 0;
				while($row = mysqli_fetch_array($result)){
					
					echo "<div id='img_div'>";
						echo "<img id='shoes_img' name='pd_image' src='shoes/" . $row['cart_image'] . "'>";
						echo "<p>" . $row['cart_brand'] . "</p>";
						echo "<p>RM " . $row['cart_price'] . "</p>";
						echo "<p>" . $row['cart_name'] . "</p>";
						echo "<p>". $size[$count] ."</p>";
						
						$cart_image = $row['cart_image'];
						$cart_brand = $row['cart_brand'];
						$cart_price = $row['cart_price'];
						$cart_name = $row['cart_name'];
						
						// insert data into order table
						$query2 =  "INSERT INTO order_sneaker(cust_name, cust_username, cust_phone, cust_email, cust_address, cart_image, cart_brand, cart_price, cart_name, cart_size)
							VALUES('$cust_name', '$cust_username', '$cust_phone', '$cust_address', '$cust_email', '$cart_image', '$cart_brand', '$cart_price', '$cart_name', '$size[$count]');";
						$result2 = mysqli_query($dbc, $query2);
						
						// get current quantity amount of product
						$query4 =  "SELECT * FROM product
									WHERE product.pd_image='". $cart_image ."'";
						$result4 = mysqli_query($dbc, $query4);
						
						while($roww = mysqli_fetch_array($result4)){
							$quantity = $roww['pd_quantity'];
						}
						
						$quantity = $quantity - 1;
						
						if($quantity > 0){
							
							// update quantity in product table
							$query5 =  "UPDATE product
										SET pd_quantity='". $quantity ."'
										WHERE product.pd_image='". $cart_image ."'";
							$result5 = mysqli_query($dbc, $query5);
							
						}else{
							
							// product out of stock. Delete row of product in product table
							$query6 =  "DELETE FROM product
										WHERE product.pd_image='". $cart_image ."'";
							$result6 = mysqli_query($dbc, $query6);
							
						}
						
					echo "</div>";
					$count++; 
				}
				
				$query3 = "DELETE FROM cart;";
				$result3 = mysqli_query($dbc, $query3);
				
				echo "<p style='text-align:center;'><a href='index.php'><button class='buttonDesign'>Back to Home Page</button></a></p>";
				echo "</div>";
				
			echo "</form>";
			
		}
		
	}else{
		echo "<p><b>You have to login first before submit your purchase order</b></p>";
		echo "<br>";
		echo "<a href='login.php'>Go to Login page</a>";
	}
	
	
?>

<body bgcolor="#acb2ff">
	
	
</body>