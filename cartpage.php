<?php
	include('connect.php');
	include('session.php');
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
		padding-left: 60px;
	}

	#buttoncheckout{
		position: relative;
		top: 0px;
		padding-right: 80px;
	}
	#checkout{
		width: 150px;
		height: 40px;
		font-size: 25px;
		float: right;
		background-color: rgba(108, 161, 161, 0.3);
	}
	
	#buttonback{
		position: relative;
	}
	#backbtn{
		width: 150px;
		height: 40px;
		font-size: 25px;
		float: left;
		background-color: rgba(108, 161, 161, 0.3);
	}

	.imgitem{
		width: 250px;
		height: 300px;
		padding: 50px;
	}

	table{
		padding-top: 30px;
		text-align: left;
		margin-right: 80px;
	}
	th, td {
		padding: 10px;
		padding-right: 50px;
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
		padding-left: 40px;
	}
	#checkbox{
		width: 25px;
		height: 25px;
	}
	#deleteposition{
		border: inset rgba(72,61,139,0.8);
		width: 35px;
		padding: 5px;
		background-color: rgba(203, 172, 255, 0.3);
		float: right;
		margin-right: 50px;
	}
</style>
</head>

<?php
	if(isset($_POST['checkout']) && isset($_POST['selected_id']))
	{
		$cartid = $_POST['selected_id'];
		$_SESSION['cart'] = array();
		array_push($_SESSION['cart'],$cartid);
		
		 echo "<script>window.location.href='purchase.php'</script>";
	}
	else if(isset($_POST['checkout']))
	{
		echo '<script type="text/javascript">alert("You did not select any item to checkout.")</script>';
	}
	else if(isset($_POST['deletebtn'])&& isset($_POST['selected_id']))
	{
		$cartid = $_POST['selected_id'];
		foreach( $cartid as $deleteid)
		{
			$sql = "DELETE FROM cart WHERE cartid = '$deleteid'";
			
			if($conn->query($sql) === TRUE)
			{
				echo '<script type="text/javascript">alert("Item has been remove from the cart.")</script>';
			}
			else
			{
				echo '<script type="text/javascript">alert("Failed to delete")</script>';
			}
		}
	}
	else if (isset($_POST['deletebtn']))
	{
		echo '<script type="text/javascript">alert("You did not select any item to remove.")</script>';
	}
	else if (isset($_POST['backbtn']))
	{
		echo "<script>window.location.href='storepage.php'</script>";
	}
?>

<body>
<form action = "<?=($_SERVER['PHP_SELF'])?>" method="POST">
	<div id = "title">Shopping Cart</div>
	<div id = "tables">
	<p>
	<?php 	$sql = "SELECT cart.cartid, cart.id, cart.store_itemid, store_item.item_name, store_item.item_price, store_item.imageitem FROM cart INNER JOIN store_item ON cart.store_itemid = store_item.store_itemid";
			$result = mysqli_query($conn,$sql);
			
			if($result->num_rows > 0 )
			{	
				echo "<table>";
					echo "<tr>";
						echo "<th>Check Box</th>";
						echo "<th>Cart ID</th>";
						echo "<th>Item ID</th>";
						echo "<th>Item Name</th>";
						echo "<th>Price</th>";
						echo "<th>Item</th>";
					echo "</tr>";
				while($row = mysqli_fetch_array($result))
				{
					if($row['id'] === $login_session)
					{
						echo "<tr>";
							echo "<td>" .'<input type = "checkbox" name = "selected_id[]" id = "checkbox" value = "'.$row['cartid'].'"/>'."</td>";
							echo "<td>" . $row['cartid']. "</td>";
							echo "<td>" . $row['store_itemid']. "</td>";
							echo "<td>" . $row['item_name']. "</td>";
							echo "<td>"."RM " . $row['item_price']. "</td>";
							echo "<td>" .'<img src = "data:image;base64,'.$row['imageitem'].'" class = "imgitem"/>'."</td>";
						echo "</tr>";
					}	 
				}				
			}
			$conn->close();
	?>		
	</p>
	</div>
	<div id = "buttoncheckout">
	<input type = "submit" name = "checkout" id = "checkout" value = "Checkout"/>
	</div>
	<div id = "deleteposition">
	<input type = "image" src = "Image/deleteicon.png" name = "deletebtn" id = "deletebtn" value = "Delete"/>
	</div>
	<div id = "buttonback">
	<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" />
	</div>
</form>
</body>