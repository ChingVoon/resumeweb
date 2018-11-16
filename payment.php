<?php
	include('connect.php');
	include('session.php');
	
?>
<html>
<head>
<title> Proof Reader Payment </title>

<?php
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	if(isset($_POST['paynow'])  && isset ($_POST["card"] ) && isset ($_POST["cname"] ) && isset ($_POST["expiry"] ) && isset ($_POST["secure"] ) && isset ($_POST["email"] ))
	{
		$card = $_POST["card"];
		$cname = $_POST["cname"];
		$expireMM = $_POST["expireMM"];
		$expireYY = $_POST["expireYY"];
		$secure= $_POST["secure"];		
		$email = $_POST["email"];
		$expiry = $expireMM . "/" . $expireYY;
		$id = $login_session;
		$_SESSION['email'] = $email;
		
		$targetfolder = "testupload/";

		$targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

		$ok=1;

		$file_type=$_FILES['file']['type'];

		if ($file_type=="application/pdf")
		{
			if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
			{
				$_SESSION['file'] = $_FILES['file']['tmp_name'];
			}
			else
			{
				echo "Problem uploading file";
			}
		}
		else 
		{
			echo "You may only upload PDFs files.<br>";
		}
		

		$sql = "INSERT INTO payment(card, cname, expiry, secure, email,id) VALUES('$card', '$cname', '$expiry', '$secure',  '$email', '$id')";
		
		if (mysqli_query($conn, $sql)) 
		{
			echo '<script type="text/javascript">alert("Payment successful.")</script>';
			echo '<script type="text/javascript">alert("Your resume will email to your email address.")</script>';
			
				echo "<script>window.location.href='email2.php';</script>";
		} 
		else 
		{
			echo "<br>";
			echo "failed.";
		}
	}
	else if(isset($_POST['paynow']))
	{
		echo '<script type="text/javascript">alert("Please fill in all the information.")</script>';
	}
?>

<style>
body
{
	background-color: #faf6f5;
	font-family: Georgia, serif;
}
header
{
	color: black;
	font-family: "Comic Sans MS", cursive, sans-serif;
	background-color: #faf0ef;
	text-align: center;
	border: 3px;
	border-style: inset;
	border-radius: 5px;
	margin: 10px;
}

.cardtype
{
	text-align: center;

}

#welcome
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-variant: small-caps;
	text-align: center;
	font-size: 20px;
}

.amount 
{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	text-align: center;
	padding: 10px 20px;
	font-size: 20px;
	color: red;
}

#cardd
{
	border: 2px solid;
	border-radius: 10px;
	margin: 70px;;
	text-align: center;
	font-size: 20px;
}

#note{
	font-size: 12px;
	color:   #34495e ;
	font-family: "Arial Black", GadPOST, sans-serif;
}

input[type=submit]
{
	position: relative;
	display: block;
	padding: auto;		
	color: black;
	margin: 0 auto;
	background: #f5b7b1 ;
	font-size: 20px;
	text-align: center;
	font-style: normal;
	cursor: pointer;
	border: none;
	border-radius: 5px;
	margin-bottom: 20px;
	box-shadow: 0 3px #999;
}
.button 
{
	position: relative;
	display: block;
	padding: 12px;
	float: left;
	color: black;
	margin-top: -40px;
	background: #f5b7b1 ;
	font-size: 15px;
	font-weight: bold;
	text-align: center;
	cursor: pointer;
	border: 1px solid;
	border-style: inset;
	border-radius: 5px;
}

.button:hover 
{
	background-color: #fadbd8;
}

.button:active 
{
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</head>
</style>
<body>

<div class="container">
<header>
   <h1 style="text-align: center;">Proof Reader Payment</h1>
   <div id = "welcome">
			<p><b> ID: <?php echo $login_session;?></b></p>
		</div>
</header>

<form action = "" id = payment  method = "POST"  enctype="multipart/form-data"> 
		<p>
		<label for='uploaded_file'>Select Your Resume File To Upload:</label> <br>
		<input type="file" name="file"/>
		</p>
	<div class = amount>
	<?php
		echo ("Amount: RM 60");	
	?>
	</div>
<div class = cardtype>

		<img src = "Image/mastericon.png" alt = "master" id = "master"/><img src = "Image/visaicon.png" alt = "visa" id = "visa"/>

</div>
<fieldset id = "cardd">
	<legend> Card Details </legend>
	  <p><label for = card > Card Number: </label>
	  <input id = card name = card type = text  placeholder = "1234 1234 1234 1234"></p>

	  <p><label for = cname> Card Holder's Name: </label>
	  <input id = cname name = cname type = text placeholder = "Name On Card"></p>

	  <p><label for = expiration> Expiration Date: </label>     
		<select name='expireMM' id='expireMM'>
			<option  value=''>Month</option>
			<option  value='01'>January</option>
			<option  value='02'>February</option>
			<option value='03'>March</option>
			<option value='04'>April</option>
			<option value='05'>May</option>
			<option value='06'>June</option>
			<option value='07'>July</option>
			<option value='08'>August</option>
			<option value='09'>September</option>
			<option value='10'>October</option>
			<option value='11'>November</option>
			<option value='12'>December</option>
		</select> 
		<select name='expireYY' id='expireYY'>
			<option class = "expireYY"value=''>Year</option>
			<option value='18'>2018</option>
			<option value='19'>2019</option>
			<option value='20'>2020</option>
			<option value='21'>2021</option>
			<option value='22'>2022</option>
		</select> 
		<input class="inputCard" type="hidden" name="expiry" id="expiry" maxlength="4"/>

	  <p><label for = secure> Security Code: </label>&nbsp;<img src = "Image/cvvicon.png" alt = "cvv" id = "imgcvv"/>
	  <input id = secure name = secure type = password /></p>
	  <div id = "note">
	  <p>NOTE: On a MasterCard or Visa, your Security Code is the last three digits printed on the signature strip on the back of your card. </p>
	  </div>
	  <p><label for = email> Email: </label>
	  <input id = email name = email type = email /></p>

	  <p><input type="submit" name="paynow" value="Pay Now"></p>

  </fieldset>
</div>
<input class="button" value="Back" onclick="location.href ='mainpage.php'">
</form>
</body>

</html>