<?php
include ('connect.php');
include ('session.php');
?>
<html>
<?php
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

if(isset($_POST['Update']))
{
	$first_name	= $_POST['first_name'];
	$last_name  = $_POST['last_name'];
	$nric = $_POST['nric'];
	$email  = $_POST['email'];
	$password  = $_POST['password'];
	$password2  = $_POST['password2'];
	$id = $login_session;
	
	
	$sql = "UPDATE users SET email = '$email ', password = '$password' WHERE id = '$login_session'" ;
	
	
	if($conn->query($sql))
	{
		echo "Record Updated Successfully!";

	}
	else
	{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}
?>

<head>
<style>
header {
	color: black;
	font-family: "Comic Sans MS", cursive, sans-serif;
	background-color:  #fad7a0  ;
	text-align: center;
	border: 2px dashed;
	border-radius: 5px;
	margin: 30px;
}

div{
		border: 2px solid;
		border-radius: 10px;
		margin: 80px;;
		text-align: center;
		font-size: 20px;
}

input[type=submit]{
		position: relative;
		display: block;
		padding: auto ;
		color: black;
		margin: 0 auto;
		background:  #fad7a0   ;
		font-size: 20px;
		text-align: center;
		font-style: normal;
		cursor: pointer;
		border: none;
		border-radius: 5px;

		margin-bottom: 20px;
	 box-shadow: 0 3px #999;
}

.button {
	position: relative;
    display: block;
    padding: 12px;
	float: left;
    color: black;
    margin-top: -40px;
    background:  #fad7a0   ;
	font-size: 15px;
	font-weight: bold;
    text-align: center;
	cursor: pointer;
    border: 1px solid;
	border-style: inset;
    border-radius: 5px;


}

.button:hover {background-color: #fdebd0 ; }

.button:active {

  box-shadow: 0 5px #666;
  transform: translateY(4px);
}



body{
	background-color:   #fef9e7  ;
}

</style>
 </head>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<title>Edit Profile</title>
<header>
<h1>User's Details</h1>
</header>
<p>
<?php
		$id = $login_session;
		$sql = "SELECT * FROM users where id = '$id'";

		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$getid  = $row['id'];
			$getfirstn  = $row['first_name'];
			$getlastn	= $row['last_name'];
			$getnric = $row['nric'];
			$getemail= $row['email'];
			$getpassword= $row['password'];
			
			echo "<div>";
			echo "<p>User ID: ".'<input readonly type="int" name="id" value="'.$login_session.'">'."</p>";
			echo "<p>First Name:".' <input readonly type="text" name="first_name" value="'.$getfirstn.'">'."</p>";
			echo "<p>Last Name:".' <input readonly type="text" name="last_name" value="'.$getlastn.'">'."</p>";
			echo "<p>NRIC: ".'<input readonly type="int" name="nric" value="'.$getnric.'">'."</p>";
			echo "<p>Email: ".'<input type="email" name="email" value="'.$getemail.'">'."</p>";
			echo "<p>Password: ".'<input type="password" name="password" value="'.$getpassword.'">'."</p>";
			echo "<p>Confirm Password: ".'<input type="password" name="password2" value="'.$getpassword.'">'."</p>";
			
			echo "<p1>".'<input type="submit" name="Update" value="Update">'."</p1>";	
			echo "</div>";
	}	
?>
</p>

</form>

<input class="button" value="Back" onclick="location.href ='mainpage.php'">

</body>
</html>




