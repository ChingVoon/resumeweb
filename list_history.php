<?php
	include('connect.php');
?>

<html>
<head>
<style>
	
	#title{
		position: relative;
		font-size: 50px;
		padding-left: 25px;
		margin-right: 350px;
		margin-left: 480px;
		margin-top: 30px;
		margin-bottom: 50px;
		border: outset rgba(31, 63, 96, 0.9);
		width: 24%;
		background-color: rgba(85, 142, 200, 0.4);
		color: #15156E;
		padding-bottom: 5px;
	}
	
	#tables{
		position: relative;
		top: 20px;
		float: left;
		padding-left: 20px;
		margin-left: 50px;
		margin-right: -100px;
	}
	
	#backbtn{
		position: relative;
		left: -150px;
		width: 150px;
		height: 40px;
		font-size: 25px;
		float: right;
		margin-top: -30px;
		background-color: rgba(108, 161, 161, 0.3);
		margin-right: 20px;
	}
	
	table{
		padding-top: 30px;
		text-align: left;
		margin-right: 20px;
	}
	th, td {
		padding: 10px;
		padding-right: 30px;
	}
	th {
		background-color: rgb(72, 141, 141);
		color: white;
		font-size: 25px;
		font-family: 'sans-serif';
		color: #F5EBE0;
	}
	td {
		background-color: rgba(108, 161, 161, 0.3);
		font-size: 25px;
		font-family: 'georgia';
		color: #134343;
		font-weight: 550;
		font-style: italic;
		padding-left: 25px;
	}
</style>
</head>

<body>
<form action = "admin_mainpage.php" method="POST">
	<div id = "title">Purchase History</div>
	<div id = "tables">
	<p>
	<?php 	$sql = "SELECT orders.orderid, orders.id, orders.total_price,orders.ship_address, orders.ship_postcode,orders.ship_city,orders.ship_state,orders.fullname,orders.phone_no, orders.ship_email, order_item.store_itemid FROM orders INNER JOIN order_item ON orders.orderid = order_item.orderid ";
			$result = mysqli_query($conn,$sql);
			
			if($result->num_rows > 0 )
			{	
				echo "<table>";
					echo "<tr>";
						echo "<th>Invoice</th>";
						echo "<th>Total Price</th>";
						echo "<th>Shipping Address</th>";
						echo "<th>Fullname</th>";
						echo "<th>Phone No.</th>";
						echo "<th>Shipping Email</th>";
						echo "<th>Item Id</th>";
						echo "<th>User Id</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result))
				{
					
						echo "<tr>";
							echo "<td>" .$row['orderid']."</td>";
							echo "<td>" . $row['total_price']. "</td>";
							echo "<td>" . $row['ship_address']." ". $row['ship_postcode'] ." ". $row['ship_city'] ." ". $row['ship_state']. "</td>";
							echo "<td>" . $row['fullname']. "</td>";
							echo "<td>" . $row['phone_no']. "</td>";
							echo "<td>" . $row['ship_email']."</td>";
							echo "<td>" . $row['store_itemid']."</td>";
							echo "<td>" . $row['id']."</td>";
						echo "</tr>"; 
				}	
			}
			else
			{
				echo '<script type="text/javascript">alert("You do not have purchase anything. Go and purchase something in our online store =)")</script>';
				echo "<script>window.location.href='admin_mainpage.php'</script>";
			}
			$conn->close();
	?>		
	</p>
	</div>
	<div id = "buttonback">
	<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" />
	</div>
</form>
</body>