<?php
	include('connect.php');
	include('session.php');
?>

<html>
	<head>
	<style>
	body{
		background-color: #d7dbdd ;
	}
	
	.plus{
		position:relative;
		top:-450px;
		right:-800px;
	}
	
	.theme01{
		position:relative;
		left:200px;
		height:450px;
		width:400px;
	}
	
	.theme02{
		position:absolute;
		left:750px;
		height:450px;
		width:400px;
	}
	
	h1{
		color:#191970;
		text-align:center;
		padding:20px;
		background-color: #7fb3d5  ;
	}
	
	span{
		display: inline-table;
		padding: 20px;
	}
	
	.theme03{
		position:absolute;
		margin-top: 50px;
		left:200px;
		height:450px;
		width:400px;
	}
	
	.theme04{
		position:absolute;
		margin-top: 50px;
		left:750px;
		height:450px;
		width:400px;
	}
	
	</style>
	</head>

	<body>
	
		<title>Template</title>
		<h1>Resume Template</h1>
		<br><br>
		
		<a href="resume1.php">
		<input type="image" value"submit" src="Image/theme01.png" onMouseOver="this.src='Image/theme01.png'" alt="theme01" class="theme01">
		</a>
		
		<a href="resume2.php">
		<input type="image" value"submit" src="Image/theme02.png" onMouseOver="this.src='Image/theme02.png'" alt="theme02" height="500" width="450" class="theme02">
		</a>
		
		<a href="storepage.php">
		<input type="image" value"submit" src="Image/plus.png" onMouseOver="this.src='Image/plus.png'" alt="theme02" class="plus"/>
		</a>
		
		
		<span>
		<?php
			$sql = "SELECT * FROM orders WHERE id = '$login_session'";
			$result = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_array($result))
			{
				$orderid = $rows['orderid'];
				$sqli = "SELECT orders.orderid, order_item.store_itemid FROM orders INNER JOIN order_item ON orders.orderid = order_item.orderid WHERE orders.orderid = '$orderid'";
				$get = mysqli_query($conn, $sqli);
				if($get->num_rows > 0)
				{
					while($roww = mysqli_fetch_array($get))
					{
						$template = $roww['store_itemid'];
						
						$sqll = "SELECT * FROM store_item where store_itemid = '$template'";
						$gett = mysqli_query($conn, $sqll);
						
						$rowss = mysqli_fetch_array($gett);
						if($rowss['store_itemid'] == 'T003')
						{
							echo '<a href="resume3.php">'.'<input type="image" value"submit" src="Image/theme03.jpeg" onMouseOver="this.src="Image/theme03.jpeg"" alt="theme03" height="500" width="450" class="theme03">'."</a>";
						}
						else if ($rowss['store_itemid'] == 'T004')
						{
							echo '<a href="resume4.php">'.'<input type="image" value"submit" src="Image/theme04.jpeg" onMouseOver="this.src="Image/theme04.jpeg"" alt="theme04" height="500" width="450" class="theme04">'."</a>";
						}
					}
				}
			}
		?>
	</span>
	</body>
</html>

