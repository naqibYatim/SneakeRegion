<?php 
	
	$page_title = 'Display all Products';
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
			
			echo "<form action='check_order.php' method='post' enctype='multipart/form-data'>";
				
				
				echo "<table>
					<tr>
					<th>Brand</th>
					<th>Price</th>
					<th>Name</th>
					<th>Quantity</th>
					<th>Category</th>
					</tr>";
				
				while($row = mysqli_fetch_array($result)){
					
					echo "<tr>";
					echo "<td>" . $row['pd_brand'] . "</td>";
					echo "<td>" . $row['pd_price'] . "</td>";
					echo "<td>" . $row['pd_name'] . "</td>";
					echo "<td>" . $row['pd_quantity'] . "</td>";
					echo "<td>" . $row['pd_category'] . "</td>";
					echo "</tr>";
					
				}
				echo "</table>";
				
			echo "</form>";
			mysqli_close($dbc);
		?>

	
</body>