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
	width: 28%;
	background-color: rgba(85, 142, 200, 0.4);
	color: #15156E;
	padding-bottom: 5px;
	}


	#detailblock{
		position: relative;
		border-style: inset;
		width: 40%;
		margin: 50px;
		padding: 10px;
	}
	#customerdetail{
		padding-left: 150px;
		font-size: 25px;
		padding-bottom: 10px;
		
	}
	#emaild, #named, #phoned, #shipd, #postd, #cityd, #stated{
		font-size: 20px;
		padding: 8px;
	}


	#paymentmethod{
		position: relative;
		border-style: inset;
		width: 40%;
		margin: 50px;
		padding: 10px;
	}
	#paymenttitle{
		padding-left: 150px;
		font-size: 25px;
		padding-bottom: 10px;
	}
	#cardnod, #expd, #cvvd{
		font-size: 15px;
		padding: 8px;
	}
	#mastericon, #visaicon{
		width: 50px;
		height: 50px;
	}
	#cvv{
		margin-right: 10px;
	}

	select, input{
		font-size: 15px;
		margin-left: 10px;
	}

	#ordersummary{
		position: relative;
		border-style: inset;
		width: 40%;
		margin: 50px;
		padding: 10px;
		float: right;
		top: -740px;
	}
	#ordertitle{
		padding-left: 150px;
		font-size: 25px;
		padding-bottom: 10px;
	}
	#amountd, #shippd, #totald{
		font-size: 15px;
		padding: 8px;
	}
	#pay{
		font-size: 20px;
		width: 150px;
	}
	
	#buttonback{
		position: relative;
		margin-left: 40px;
		top: 20px;
	}
	#backbtn{
		width: 150px;
		height: 40px;
		font-size: 25px;
		float: left;
		background-color: rgba(108, 161, 161, 0.3);
	}
	</style>
</head>


<?php
	if(isset($_POST['pay'])&&isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['postcode'])&&isset($_POST['city'])&&isset($_POST['state']))
	{
		
		$email = $_POST['email'];
		$fullname = $_POST['name'];
		$phoneno = $_POST['phone'];
		$shipaddr = $_POST['address'];
		$postcode = $_POST['postcode'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$totalamount = $_SESSION['totalamount'];
		$sql = "INSERT INTO orders(orderid, id, total_price, ship_address, ship_postcode, ship_city, ship_state, fullname, phone_no, ship_email) VALUES ((SELECT MAX(orderid)+1 FROM orders cust),'$login_session','$totalamount','$shipaddr','$postcode','$city','$state','$fullname','$phoneno','$email')";
		
		if($conn->query($sql) === TRUE)
		{
			
			$sql = "SELECT orderid FROM orders WHERE id = '$login_session' AND total_price = '$totalamount' AND ship_email = '$email' AND fullname = '$fullname' AND phone_no = '$phoneno'";
			$result = mysqli_query($conn,$sql);
			if($result->num_rows > 0 )
			{
				$row = mysqli_fetch_array($result);
				$order_id = $row['orderid'];
				
				for($z = 0; $z < sizeof($_SESSION['store_itemid']); $z++)
				{
					$item_id = $_SESSION['store_itemid'][$z];
					
					$addsql = "INSERT INTO order_item(order_itemid, store_itemid, orderid) VALUES ((SELECT MAX(order_itemid)+1 FROM order_item cust), '$item_id','$order_id')"; 
	
					if($conn->query($addsql) === TRUE)
					{
						echo '<script type="text/javascript">alert("Done Payment! Thanks for supporting.")</script>';
						echo "<script>window.location.href='mainpage.php'</script>";
					}
				}
				for($x = 0; $x < sizeof($_SESSION['cart'][0]); $x++)
				{
					$cart = $_SESSION['cart'][0][$x];	
					$deletesql = "DELETE FROM cart WHERE cartid = '$cart'";
					mysqli_query($conn, $deletesql);
				}
			}
			
			
		}
		
		echo '<script type="text/javascript">alert("Your Payment Has Successful. Thanks.")</script>';
		
	}
	else if(isset($_POST['pay']))
	{
		echo '<script type="text/javascript">alert("Please Fill In All The Information!!!")</script>';
	}
	else if(isset($_POST['backbtn']))
	{
		echo "<script>window.location.href='cartpage.php'</script>";
	}
?>

<body>
	<form action = "" method = "POST">
		<div id = "buttonback">
		<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" />
		</div>
		<div id = "title">Payment Process</div>
		<div id = "detailblock">
		<div id = "customerdetail">Customer Details</div>
			<div id = "emaild">Email: <input type="email" name="email" id = "email"/></div>
			<div id = "named">Full Name: <input type="text" name="name" id = "name"/></div>
			<div id = "phoned">Phone No.: <input type="text" name="phone" id = "phone"/></div>
			<div id = "shipd">Shipping Address: <input type="text" name="address" id = "address"/></div>
			<div id = "postd">Postcode: <input type="text" name="postcode" id = "postcode"/></div>
			<div id = "cityd">City: <input type="text" name="city" id = "city"/></div>
			<div id = "stated">State: 
				<select name="state">
				<option class ="state" value="Johor">Johor</option>
				<option class ="state" value="Kedah">Kedah</option>
				<option class ="state" value="Kelantan">Kelantan</option>
				<option class ="state" value="Negeri Sembilan">Negeri Sembilan</option>
				<option class ="state" value="Melaka">Melaka</option>
				<option class ="state" value="Pahang">Pahang</option>
				<option class ="state" value="Penang">Penang</option>
				<option class ="state" value="Perlis">Perlis</option>
				<option class ="state" value="Perak">Perak</option>
				<option class ="state" value="Sarawak">Sarawak</option>
				<option class ="state" value="Sabah">Sabah</option>
				<option class ="state" value="Selangor">Selangor</option>
				<option class ="state" value="Terrenganu">Terrenganu</option>
				</select>
			</div>
		</div>
		
		<div id = "paymentmethod">
			<div id = "paymenttitle">Payment Method</div>
			<div id = "visamaster"><img src = "Image/visaicon.png" alt = "visaicon" id = "visaicon">
			<img src = "Image/mastericon.png" alt = "mastericon" id = "mastericon"></div>
			<div id = "cardnod">Card Number: <input type="text" name="cardno" id = "cardno"/></div>
			<div id = "expd">Expiration Date: <select name="expdate">
				<option class ="expdate" value="01">01</option>
				<option class ="expdate" value="02">02</option>
				<option class ="expdate" value="03">03</option>
				<option class ="expdate" value="04">04</option>
				<option class ="expdate" value="05">05</option>
				<option class ="expdate" value="06">06</option>
				<option class ="expdate" value="07">07</option>
				<option class ="expdate" value="08">08</option>
				<option class ="expdate" value="09">09</option>
				<option class ="expdate" value="10">10</option>
				<option class ="expdate" value="11">11</option>
				<option class ="expdate" value="12">12</option>
				</select>
				<select name="expyear">
				<option class ="expyear" value="18">18</option>
				<option class ="expyear" value="19">19</option>
				<option class ="expyear" value="20">20</option>
				<option class ="expyear" value="21">21</option>
				<option class ="expyear" value="22">22</option>
				<option class ="expyear" value="23">23</option>
				<option class ="expyear" value="24">24</option>
				<option class ="expyear" value="25">25</option>
				<option class ="expyear" value="26">26</option>
				<option class ="expyear" value="27">27</option>
				<option class ="expyear" value="28">28</option>
				<option class ="expyear" value="29">29</option>
				</select>
			</div>
			<div id = "cvvd">Security Code: <input type = "text" name="cvv" id = "cvv"/><img src = "Image/cvvicon.png" alt = "cvvicon" id = "cvvicon"></div>
		</div>	
		<div id = "ordersummary">
		<div id = "ordertitle">Order Summary</div>	
		<?php 	
				$itemid = array();
				$amount = 0;
				$_SESSION['store_itemid'] = array();
				
				for($x = 0; $x < sizeof($_SESSION['cart'][0]); $x++)
				{
					$cart = $_SESSION['cart'][0][$x];
					$sql = "SELECT store_itemid FROM cart WHERE cartid = '$cart'"; 
					$result = mysqli_query($conn,$sql);  
					if($result->num_rows > 0 )
					{
						$row = mysqli_fetch_array($result);
						array_push($itemid,$row['store_itemid']);
					}
				}
				
				foreach($itemid as $item)
				{
					$sql = "SELECT * FROM store_item WHERE store_itemid = '$item'"; 
					$result = mysqli_query($conn,$sql);  
					if($result->num_rows > 0 )
					{
						$row = mysqli_fetch_array($result);
						$price = $row['item_price'];
						array_push($_SESSION['store_itemid'] ,$row['store_itemid']);
						
						$amount = $amount + $price;
						$_SESSION['amount'] = $amount;
					}
				}
		?>
		<div id = "amountd">Amount (RM): <input type = "text" name = "amount" id = "amount" value = "<?php echo $_SESSION['amount'].".00"; ?>" readonly /></div>
		
		<div id = "shippd">Shipping Fee (RM): <input type = "text" name = "shippingfee" id = "shippingfee" value = "5.00" readonly /></div>
	
		<?php
			$totalamout = 0;
			$amount = $_SESSION['amount'];
			
			$totalamount = $amount + 5;
			$_SESSION['totalamount'] = $totalamount;
		?>
		<div id = "totald">Total Amount (RM): <input type = "text" name = "totalamount" id = "totalamount" value = "<?php echo $_SESSION['totalamount'].".00"; ?>" readonly /></div>
		<input type = "submit" name = "pay" id = "pay" value = "Pay"/>
		</div>
	</form>
</body>
</html>