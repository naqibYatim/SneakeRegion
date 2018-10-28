<?php 
	
	$page_title = 'Check Order Page';
	include ('./header_admin.html');
	
	if(isset($_POST['delete'])){
		
		$orderid = $_POST['delete'];
		
		require_once 'connect.php';
			
		$query2 = "DELETE FROM order_sneaker WHERE order_id=". $orderid ."";
		$result2 = mysqli_query($dbc, $query2);
		
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
			width: 200px;
			height: 140px;
		}
		
		table, td, th {    
			border: 1px solid #ddd;
			text-align: left;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 15px;
		}
		
	</style>
	
</head>

<body bgcolor="#acb2ff">
	
	<?php
			
			require_once 'connect.php';
			
			$query = "SELECT * FROM order_sneaker";
			$result = mysqli_query($dbc, $query);
			
			echo "<form action='check_order.php' method='post' enctype='multipart/form-data'>";
				
				//echo "<div id='content'>";
				
				echo "<table>
					<tr>
					<th>Cust Name</th>
					<th>Cust Username</th>
					<th>Cust Phone</th>
					<th>Cust Email</th>
					<th>Cust Address</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Name</th>
					<th>Size</th>
					<th>Delete</th>
					</tr>";
				
				while($row = mysqli_fetch_array($result)){
					
					echo "<tr>";
					echo "<td>" . $row['cust_name'] . "</td>";
					echo "<td>" . $row['cust_username'] . "</td>";
					echo "<td>" . $row['cust_phone'] . "</td>";
					echo "<td>" . $row['cust_email'] . "</td>";
					echo "<td>" . $row['cust_address'] . "</td>";
					echo "<td>" . $row['cart_brand'] . "</td>";
					echo "<td>" . $row['cart_price'] . "</td>";
					echo "<td>" . $row['cart_name'] . "</td>";
					echo "<td>" . $row['cart_size'] . "</td>";
					echo "<td><button type='submit' formaction='check_order.php' name='delete' value=" . $row['order_id'] . ">Delete</button></td>";
					echo "</tr>";
					
				}
				echo "</table>";
				/*
				while($row = mysqli_fetch_assoc($result)){
					
					//echo "<div id='img_div'>";
						echo "<img id='shoes_img' name='pd_image' src='shoes/" . $row['cart_image'] . "'>";
						echo "<p>" . $row['cart_brand'] . "</p>";
						echo "<p>RM " . $row['cart_price'] . "</p>";
						echo "<p>" . $row['cart_name'] . "</p>";
						echo "<select name='cart_size[]'>
								<option value='UK 5'>UK 5</option>
								<option value='UK 6'>UK 6</option>
								<option value='UK 7'>UK 7</option>
								<option value='UK 8'>UK 8</option>
								<option value='UK 9'>UK 9</option>
							</select>";
							
						echo "<p><button type='submit' formaction='cart.php' name='cancel' value=" . $row['cart_id'] . ">Cancel</button></p>";
						
					//echo "</div>";
					
				}
				*/
				//echo "</div>";
				
				
			echo "</form>";
			mysqli_close($dbc);
		?>

	
</body>