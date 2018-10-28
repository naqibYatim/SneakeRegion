<?php 
	
	// start the session
	session_start();
	
	$page_title = 'Nike Women';
	// include the nav bar
	include ('./header.html');
	
	$brand = "Nike";
	
	if(isset($_SESSION['id'])){
		//echo 'Id: ' . $_SESSION['id'];
		//echo "<br>";
	}
	
	if(isset($_POST['submit'])){
		
		$pd_id = $_POST['submit'];
		//echo 'Pd Id: ' . $pd_id;
			//echo "<br>";
		
		// connect to database
		require_once('connect.php');
		
		// execute query
		$query = "SELECT * FROM product WHERE product.pd_id=" . $pd_id . "";
		$result = mysqli_query($dbc, $query);
		
		// fetch the data
		while($row = mysqli_fetch_array($result)){
				
			$pd_image = $row['pd_image'];
			$pd_brand = $row['pd_brand'];
			$pd_price = $row['pd_price'];
			$pd_name = $row['pd_name'];
			$pd_quantity = $row['pd_quantity'];
			$pd_category = $row['pd_category'];
			
			
		}
		
		// insert product data into cart table
		$query2 = "INSERT INTO cart (cart_image, cart_brand, cart_price, cart_name, cart_category, product_id)
					VALUES ('$pd_image', '$pd_brand', '$pd_price', '$pd_name', '$pd_category', '$pd_id')";
		$result2 = mysqli_query($dbc, $query2);
		
		if($result2){
			echo "Item " . $pd_brand . " " . $pd_name . " have been added to cart";
		}
		
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
			width: 250px;
			height: 180px;
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
		
	</style>
	
</head>

<body bgcolor="#acb2ff">

	<div id="demoFont">Nike Women's Shoes</div>
	
		<?php
			
			require_once 'connect.php';
			
			$query = "SELECT * FROM product
						WHERE product.pd_brand='NIKE'
						AND product.pd_category='women';";
			$result = mysqli_query($dbc, $query);
			
			echo "<form action='nike_women.php' method='post' enctype='multipart/form-data'>";
				
				echo "<div id='content'>";
				
					// "mysqli_num_rows" returns the number of rows in a result set
				$numarr = mysqli_num_rows($result);
				
				while($row = mysqli_fetch_assoc($result)){
					
					echo "<div id='img_div'>";
						echo "<img id='shoes_img' name='pd_image' src='shoes/" . $row['pd_image'] . "'>";
						echo "<p>" . $row['pd_brand'] . " " . $row['pd_category'] . "</p>";
						echo "<p>" . $row['pd_name'] . "</p>";
						echo "<p>RM " . $row['pd_price'] . "</p>";
						
						echo "<p><button type='submit' class='buttonDesign' name='submit' value=" . $row['pd_id'] . ">Add to cart</button></p>";
					echo "</div>";
					
				}
				
				echo "</div>";
				
			echo "</form>";
		?>
</body>