
<?php 
include("connect.php");
include("session.php");

if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
$sql = "SELECT * FROM users WHERE id = '$login_session'";
$result = $conn->query($sql);

if($row = mysqli_fetch_assoc($result)){

	$id = $row["id"];
	$first_name = $row["first_name"];
	$last_name = $row["last_name"];
	$nric = $row["nric"];
	$email = $row["email"];
	$password = $row["password"];

} 
?>

<html>
<head>
<script>
function validate{
	var password = document.getElementById('password').value;
	var password2 = document.getElementById('password2').value;
	var newpass = "";
	
	if(password == "" || password2  == "" )
		{
			alert('Please Fill In All Fields to change password');
			return false;
		}
		else if (password == password2)
		{
			alert('Password not match! Please enter again.')
			return false;
		}
		document.updatee.password.value = newpass;
		return true;
}
</script>
<body>
Change Password <br>
-------------------------<br>
<form name = "updatee"action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit = "return validate()">
<div>User ID: <input type="text" name="id" value="<?php echo $id; ?>"></div>
<div>First Name: <input type="text" name="first_name" value="<?php echo $first_name; ?>"></div>
<div>Last Name: <input type="text" name="last_name" value="<?php echo $last_name; ?>"></div>
<div>NRIC: <input type="text" name="nric" value="<?php echo $nric; ?>"></div>
<div>Email.: <input type="text" name="email" value="<?php echo $email; ?>"></div>
<div>Password: <input type="password" name="password" id="password"></div>
<div>Confirm Password: <input type="password" name="password2" id="password2"></div>
<input type="submit" name="Update" value="Update"><br>
</body>
</html>

<?php
include 'connect.php';

if(isset($_POST['Update'])){
	$id = $_POST['id'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$nric = $_POST['nric'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$sql = "UPDATE users SET password = '$password' WHERE id = '$id'";
	
	if($conn->query($sql)){
		echo "Record Updated " . $password . "<br>";
		
	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>