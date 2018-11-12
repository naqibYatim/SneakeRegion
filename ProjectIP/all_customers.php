<?php 
	
	$page_title = 'Display all Customers';
	include ('./header_admin.html');
	
	if(isset($_POST['delete'])){
		
		$cust_id = $_POST['delete'];
		
		require_once 'connect.php';
			
		$query4 = "DELETE FROM customer WHERE cust_id=". $cust_id ."";
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
			
			$query = "SELECT * FROM customer";
			$result = mysqli_query($dbc, $query);
				
				echo "<table>
					<tr bgcolor='#969dfd'>
					<th>No</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Phone Number</th>
					<th>Email</th>
					<th>Address</th>
					<th>Gender</th>
					<th>Registration Date</th>
					<th>Delete</th>
					</tr>";
				
				$count = 1;
				while($row = mysqli_fetch_array($result)){
					
					echo "<form action='all_customers.php' method='post' enctype='multipart/form-data'>";
					
					$id = $row['cust_id'];
					$fullname = $row['cust_name'];
					$username = $row['cust_username'];
					$phone = $row['cust_phone'];
					$email = $row['cust_email'];
					$address = $row['cust_address'];
					$gender = $row['cust_gender'];
					$date = $row['registration_date'];
					
					echo "<tr>";
					echo "<input type='hidden' name='prid' value=" . $id . ">";
					echo "<td>" . $count . "</td>";
					echo "<td>" . $fullname . "</td>";
					echo "<td>" . $username . "</td>";
					echo "<td>" . $phone . "</td>";
					echo "<td>" . $email . "</td>";
					echo "<td>" . $address . "</td>";
					echo "<td>" . $gender . "</td>";
					echo "<td>" . $date . "</td>";
					echo "<td><button type='submit' formaction='all_customers.php' name='delete' value=" . $id . ">Delete</button></td>";
					echo "</tr>";
					
					echo "</form>";
					$count++;
				}
				echo "</table>";
				
			mysqli_close($dbc);
		?>

	
</body>