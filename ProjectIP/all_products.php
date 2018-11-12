<?php 
	
	$page_title = 'Display all Products';
	include ('./header_admin.html');
	
	if(isset($_POST['submit'])){
		
		$pdid = $_POST['prid'];
		$quan = $_POST['quantity'];
		$price = $_POST['price'];
		
		if(isset($_POST['quantity'])){
			$quan = $_POST['quantity'];
			require_once 'connect.php';
			$query2 = "UPDATE product SET pd_quantity=". $quan ." WHERE pd_id=". $pdid ."";		
			$result2 = mysqli_query($dbc, $query2);
		}
		
		if(isset($_POST['price'])){
			$price = $_POST['price'];
			require_once 'connect.php';
			$query3 = "UPDATE product SET pd_price=". $price ." WHERE pd_id=". $pdid ."";		
			$result3 = mysqli_query($dbc, $query3);
		}
		
	}
	
	if(isset($_POST['delete'])){
		
		$pdid = $_POST['delete'];
		
		require_once 'connect.php';
			
		$query4 = "DELETE FROM product WHERE pd_id=". $pdid ."";
		$result4 = mysqli_query($dbc, $query4);
		
	}
	
?>
<head>
	
	<style>
		
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
			
			$query = "SELECT * FROM product";
			$result = mysqli_query($dbc, $query);
				
				echo "<table>
					<tr bgcolor='#969dfd'>
					<th>No</th>
					<th>Brand</th>
					<th>Price</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Category</th>
					<th>Size</th>
					<th>Update</th>
					<th>Delete</th>
					</tr>";
				
				$count = 1;
				while($row = mysqli_fetch_array($result)){
					
					echo "<form action='all_products.php' method='post' enctype='multipart/form-data'>";
					
					$id = $row['pd_id'];
					$brand = $row['pd_brand'];
					$price = $row['pd_price'];
					$name = $row['pd_name'];
					$quantity = $row['pd_quantity'];
					$size = $row['pd_size'];
					
					echo "<tr>";
					echo "<input type='hidden' name='prid' value=" . $id . ">";
					echo "<td>" . $count . "</td>";
					echo "<td>" . $brand . "</td>";
					echo "<td><input type='text' name='price' size='2' placeholder='" . $price . "'></td>";
					echo "<td>" . $name . "</td>";
					echo "<td><input type='text' name='quantity' size='2' placeholder='" . $quantity . "'></td>";
					echo "<td>" . $row['pd_category'] . "</td>";
					echo "<td>" . $size . "</td>";
					echo "<td><input type='submit' name='submit' value='Update'></td>";
					echo "<td><button type='submit' formaction='all_products.php' name='delete' value=" . $id . ">Delete</button></td>";
					echo "</tr>";
					
					echo "</form>";
					$count++;
				}
				echo "</table>";
				
			mysqli_close($dbc);
		?>

	
</body>