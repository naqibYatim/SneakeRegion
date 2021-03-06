<?php 
	
	// start the session
	session_start();
	
	$page_title = 'Cart';
	ob_start();
	include ('./header_user.html');
	
	if(isset($_SESSION['id'])){
		//echo 'Id: ' . $_SESSION['id'];
		$id = $_SESSION['id'];
	}
	
	if(isset($_POST['clear'])){
		
		// unset cart session
		unset($_SESSION['cart_amount']);

		require_once 'connect.php';
		$query = "DELETE FROM cart";
		$result = mysqli_query($dbc, $query);
		
		header('Location: '.$_SERVER['PHP_SELF']);
		die;
		
	}
	
	if(isset($_POST['cancel'])){
		
		$cart_amount = $_SESSION['cart_amount'];
		$cart_amount -=  1;
		// Set session variables
		$_SESSION['cart_amount'] = $cart_amount;
		
		$cartid = $_POST['cancel'];
		require_once 'connect.php';
		$query = "DELETE FROM cart WHERE cart_id=". $cartid ."";
		$result = mysqli_query($dbc, $query);
		
		header('Location: '.$_SERVER['PHP_SELF']);
		die;
		
	}
	
?>

<head>
	
	<style>
		
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
			width: 270px;
			height: 200px;
		}
		
		#demoFont {
			font-family: "Arial Black", Gadget, sans-serif;
			font-size: 45px;
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
			font-size: 15px;
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
		
		.buttonDesign2 {
			background-color: #4367e7;
			text-align:center;
			border: none;
			color: white;
			padding: 15px 42px;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
		.buttonDesign {
			background-color: #4367e7;
			border: none;
			color: white;
			padding: 10px 22px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			margin: 4px 2px;
			cursor: pointer;
		}
		
	</style>
	
</head>

<body bgcolor="#acb2ff">

	<div id="demoFont">Cart Items</div>
	
		<?php
			
			require_once 'connect.php';
			
			$query = "SELECT * FROM cart";
			$result = mysqli_query($dbc, $query);
			
			echo "<form action='confirm_order.php' method='post' enctype='multipart/form-data'>";
				
					// "mysqli_num_rows" returns the number of rows in a result set
				$numarr = mysqli_num_rows($result);
				
				if($numarr == 0){
					
					echo "<br>";
					echo "<div id='demoFont2'>Currently there are no item in cart</div>";
					
				}else{
					
					echo "<br>";
					echo "<div id='demoFont2'>There are " . $numarr . " item(s) in cart. <b>Please select size for each of your item. Click confirm after you had finished selecting</b></div>";
					
					echo "<div id='demoFont3'>Make sure you have <a href='login.php'>login</a> your account before purchasing our product. Click <a href='signup.php'>signup</a> at navigation bar above if you didn't have account yet</b></div>";
					echo "<br>";
					
					echo "<div id='content'>";
					
					$total = 0;
					while($row = mysqli_fetch_assoc($result)){
						
							echo "<div id='img_div'>";
							echo "<img id='shoes_img' name='pd_image' src='shoes/" . $row['cart_image'] . "'>";
							echo "<p>" . $row['cart_brand'] . "</p>";
							echo "<p>RM " . $row['cart_price'] . "</p>";
							echo "<p>" . $row['cart_name'] . "</p>";
							
							$cart_price = $row['cart_price'];
							$cart_category = $row['cart_category'];
							
							$total += $cart_price;
							
							if($cart_category == "kids"){
								
								echo "<select name='cart_size[]'>
										<option value='UK 2'>UK 2</option>
										<option value='UK 3'>UK 3</option>
										<option value='UK 4'>UK 4</option>
										<option value='UK 5'>UK 5</option>
										<option value='UK 6'>UK 6</option>
									</select>";
									
								echo "<p><button type='submit' class='buttonDesign' formaction='cart.php' name='cancel' value=" . $row['cart_id'] . ">Cancel</button></p>";
								
							}else{
								
								echo "<select name='cart_size[]'>
										<option value='UK 5'>UK 5</option>
										<option value='UK 6'>UK 6</option>
										<option value='UK 7'>UK 7</option>
										<option value='UK 8'>UK 8</option>
										<option value='UK 9'>UK 9</option>
									</select>";
									
								echo "<p><button type='submit' class='buttonDesign' formaction='cart.php' name='cancel' value=" . $row['cart_id'] . ">Cancel</button></p>";
								
							}
							
						echo "</div>";
						
					}
					echo "<div id='demoFont2'><p>Total: RM <b>". $total ."</b></p></div>";
					
					echo "<p style='text-align:center;'><button type='submit' class='buttonDesign2' formaction='index.php' name='back'>Continue Shopping</button>
														<button type='submit' class='buttonDesign2' formaction='cart.php' name='clear'>Clear All</button>
														<input type='submit' class='buttonDesign2' name='submit' value='Confirm Order'></p>";
				}
				
				echo "</div>";
				
			echo "</form>";
			//echo "<p style='float: right;'><a href='index.php'>Click here to continue shopping</a></p>";
			mysqli_close($dbc);
		?>
	
</body>
