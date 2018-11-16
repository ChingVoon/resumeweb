<?php 
	include('connect.php');
	include('session.php');
?>
<html>
<head>
	<style>
	body{
		margin:15px;
	}
	ul{
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}
	li{
		float: left;
	}
	li a{
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}
	#home{
		padding-left: 20px;
	}
	li a.active:hover{
		background-color: #111;
	}
	li a.blank{
		padding-left: 800px;
	}
	li a.welcome{
	}
	li a img{
		margin-top: -10px;
		margin-bottom: -10px;
	}


	#title{
		position: relative;
		font-size: 50px;
		padding-left: 25px;
		margin-right: 350px;
		margin-left: 325px;
		margin-top: 30px;
		margin-bottom: 50px;
		border-style: outset;
		width: 47%;
	}

	#themestore{
		font-size: 25px;
		margin-bottom: -25px;
		margin-left: 50px;
	}
	#bodytheme{
		border-style: inset;
		padding-left: 20px;
		padding-right: 20px;
		margin-bottom: 100px;
		display: table; 
		border-collapse: separate; 
		border-spacing: 10px 0;
		margin: 50px;
		width: 89%;
	}

	#bodytheme img {
		padding:20px;
	}
	span{
		display: inline-table;
		padding: 20px;
	}

	#bookstore{
		font-size: 25px;
		margin-bottom: -25px;
		margin-left: 50px;
	}
	#bodybook{
		position: relative;
		border-style: inset;
		padding: 10px;
		padding-left: 20px;
		display: table; 
		border-collapse: separate; 
		border-spacing: 10px 0;
		margin: 50px;
	}

	#borbook{
		
	}



	@media screen and (max-width: 800px) {
		#title{
			margin:20px;
			margin-left: 25%;
		}
		
		#themestore{
			margin-top: 30px;
		}
		
		#bodytheme {
			width: 95%;
		}
		#bortheme3{
			display: table-row;
		}
		#bortheme4{
			display: table-row;
		}
		
		#bodybook {
			width: 95%;
		}
		#borbook1{
			display: table-row;
		}
		#borbook2{
			display: table-row;
		}
		#borbook3{
			display: table-row;
		}
		#borbook4{
			display: table-row;
		}
	}

	</style>
</head>


<?php
	if(! $conn ) 
	{
      die('Could not connect: ' . mysql_error());
	}
	
	if(isset($_REQUEST['btnadd']))
	{
		$check = false;
		$check2 = false;
		$itemgain = array();
		$itemgain2 = array();
		$getid = array_pop($_REQUEST['btnadd']);
		
		$sqlii = "SELECT * FROM cart WHERE id = '$login_session'";
		$gett = mysqli_query($conn, $sqlii);
		if($gett->num_rows >0)
		{
			while($rowww = mysqli_fetch_array($gett))
			{
				array_push($itemgain2,$rowww['store_itemid']);
			}
			
			foreach($itemgain2 as $item)
			{	
				if($item == $getid)
				{
					echo '<script type="text/javascript">alert("You already purchase this item or already added to your cart. This item can only purchase 1 time!")</script>';
					$check = false;
					break;
				}
				else
				{
					$check = true;
				}
			}
		}
		else
		{
			$check = true;
		}
		
		$sqli = "SELECT orders.orderid, orders.id, order_item.store_itemid FROM orders INNER JOIN order_item ON orders.orderid =order_item.orderid WHERE orders.id = '$login_session'";
		$get = mysqli_query($conn, $sqli);
		if($get->num_rows > 0)
		{
			while($roww = mysqli_fetch_array($get))
			{
				array_push($itemgain,$roww['store_itemid']);
			}
				
				foreach($itemgain as $items)
				{
					if($items == $getid)
					{
						echo '<script type="text/javascript">alert("You already purchase this item or already added to your cart. This item can only purchase 1 time!")</script>';
						$check2 = false;
						break;
					}
					else
					{
						$check2 = true;
					}
				}
		}
		else
		{
			$check2 = true;
		}
			
		if($check2 == true && $check == true)
		{
			$sql = "INSERT INTO cart (cartid, id, store_itemid) VALUES ((SELECT MAX(cartid)+1 FROM cart cust), '$login_session', '$getid')";
		
			if (mysqli_query($conn, $sql)) 
			{
				echo '<script type="text/javascript">alert("Your item has successfully add into your cart!")</script>';
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		}
	}
	
	if(isset($_REQUEST['btnadd1']))
	{
		$getid = array_pop($_REQUEST['btnadd1']);
		$sql = "INSERT INTO cart (cartid, id, store_itemid) VALUES ((SELECT MAX(cartid)+1 FROM cart cust), '$login_session', '$getid')";
		
		if (mysqli_query($conn, $sql)) 
		{
			echo '<script type="text/javascript">alert("Your item has successfully add into your cart!")</script>';
		} 
		else 
		{
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	}
?>

<?php

?>

<body>
<form action="<?=($_SERVER['PHP_SELF'])?>" method="POST">

	<div id = "navi">
	<ul>
		<li><a class = "active" id = "home" href = 'mainpage.php'>Home</a></li>
		<li><a class = "active" href = 'purchasehistory.php'>Purchase History</a></li>
		<li><a class = "blank"></a></li>
		<li><a class = "welcome">Welcome! <?php echo $login_session?></a></li>
		<li><a href = 'cartpage.php'><img src = "Image/carticon.png" alt = "carticon" id = "carticon"></a></li>
	</ul>
	</div>
	
	<div id = "title">Welcome to Our Online Store</div>

	<div id = "themestore">
		<p>Resume Theme</p>
	</div>
	<div id = "bodytheme">	
		<div id = "bortheme3">
		<?php 	$sql = "SELECT * FROM store_item WHERE store_itemid LIKE 'T%'";
				$result = mysqli_query($conn,$sql);
				
				if($result->num_rows > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
						echo "<span>";
						echo "<p>".'<img src = "data:image;base64,'.$row['imageitem'].'" class = "imgitem" id ="themeimg" height="300" width="250"/>'."</p>";
						echo "<p>Theme Name: ".$row['item_name']."</p>";
						echo "<p>Price: RM ".$row['item_price']."</p>";	
						echo "<p>".'<Button type = "submit" name = "btnadd[]" value = "'.$row['store_itemid'].'">'."Add to Cart"."</Button>"."</p>";
						echo "</span>";
					}
				}
		?>
		</div>
	</div>
	
	<div id = "bookstore">
		<p>Books</p>
	</div>
	<div id = "bodybook">
		<div id = "borbook">
			<?php 	$sql = "SELECT * FROM store_item WHERE store_itemid LIKE 'B%'";
					$result = mysqli_query($conn,$sql);
					
					if($result->num_rows > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
							echo "<span>";
							echo "<p>".'<img src = "data:image;base64,'.$row['imageitem'].'" class = "imgitem" id ="themeimg" height="300" width="250"/>'."</p>";
							echo "<p>Theme Name: ".$row['item_name']."</p>";
							echo "<p>Price: RM ".$row['item_price']."</p>";	
							
							echo "<p>".'<Button type = "submit" name = "btnadd1[]" value = "'.$row['store_itemid'].'">'."Add to Cart"."</Button>"."</p>";
							echo "</span>";
						}
						
					}
			?>
		</div>
	</div>
	
</form>
</body>
</html>
	