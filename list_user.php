<?php
include 'connect.php';

if(isset($_POST['Delete'])){
	$id = $_POST['id'];
	
	$sqli = "SELECT orderid FROM orders WHERE id = '$id'";
	$result = mysqli_query($conn, $sqli);
	while($row = mysqli_fetch_array($result))
	{
		$orderid = $row['orderid'];
		
		$sqll = "DELETE FROM order_item WHERE orderid = '$orderid'";
		mysqli_query($conn, $sqll);
		
	}
	
	$dltsql = "DELETE FROM orders WHERE id = '$id'";
	$results = mysqli_query($conn, $dltsql);
	
	$deltsql = "DELETE FROM addresume WHERE id = '$id'";
	$resultss = mysqli_query($conn, $deltsql);
	
	$sql = "DELETE FROM users WHERE id = '$id'";
	
	if($conn->query($sql)){
		echo $id . " is deleted";
		echo "<script>window.location.href='list_user.php';</script>";
		
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}

mysqli_close($conn);
?>

<html>
<head><title>List User</title>
<style>
body{
	background-color: #79d9df
;
	
}
h1{
	background-image:url("image/user.png");
	 background-repeat: no-repeat;
	 background-position:top;
	text-align:center;
	
	font-size:50px;
	font-family: fantasy;
	padding-top:70px;
	background-color:white;
	
}

tr{
	text-align:center;
	font-size:25px;
	font-family: fantasy;
	color:#CD5C5C;
	
}

td{
	font-size:20px;
	font-family:sans-serif;
	font-weight: bold;
}

table{
	margin:0 auto;
}

h2{
	font-family:fantasy;
	position:relative;
	left:400px;
	
}

input[type=submit]{
	width: 50%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input[type=text]{
	width: 40%;
    background-color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

label{
	font-family:fantasy;
	font-size:25px;
}

.userid{
	margin:auto;
	border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:380px;
}

.delete{
	margin:auto;
}

#buttonback{
	position: relative;
	margin-left: 40px;
	top: 20px;
}
#backbtn{
	width: 150px;
	height: 40px;
	font-size: 18px;
	float: left;
	background-color: #4CAF50;
}

</style>
</head>

<body>

<h1>List of All Users</h1>
<div id = "buttonback">
		<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" onclick = "location.href='admin_mainpage.php'" />
</div>

<?php
include("connect.php");

if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

$sql = "SELECT id,first_name, last_name, email, nric FROM users ORDER BY id ASC";
$result = $conn->query($sql);



	echo "<table border = '1'>
<tr>
<th>User Id</th>
<th>First Name</th>
<th>Last Name</th>
<th>Email</th>
<th>NRIC</th>
</tr>";
while($row = mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>" .$row["id"]."</td>";
	echo "<td>" .$row["first_name"]."</td>";
	echo "<td>" .$row["last_name"]."</td>";
	echo "<td>" .$row["email"]."</td>";
	echo "<td>" .$row["nric"]."</td>";
}
?>

</table>

<form name= "deletee" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="delete">
<h2>Delete User Account</h2>
<div class="userid">
<label>User Id</label><br> 
<input type="text" name="id"><br>
<input type="submit" name="Delete" value="Delete User Account">
</div>
</div>
</form>
</body>
</html>





