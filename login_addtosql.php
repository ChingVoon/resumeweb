<?php
	include("connect.php");
	session_start();
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	if(isset($_POST['login_btn']))  
	{
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users where email = '$email' and password = '$password'"; 
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_array($result))
			{
				$userid = $row['id'];
			}
		}
		
		if ($result->num_rows == 1)
		{
			if ($conn->query($sql) == TRUE) {	
				echo "<br>";
				echo "You are now logged into the system. This is the Main Page!";
				echo "<script>window.location.href='mainpage.php'</script>";
				$_SESSION['id']= $userid;
			}
			
		}
		else if ($email == "admin@admin.com" && $password == "123")
		{ 	
			echo "<br>";
			echo "This Main Page for admin. Proceed to admin_mainpage.php";
			echo "<script>window.location.href='admin_mainpage.php'</script>";
		}
		
		else if ($email == "proof@proof.com" && $password == "123")
		{ 	
			echo "<br>";
			echo "This Main Page for Proof Reader. Proceed to proof_main.php";
			echo "<script>window.location.href='proof_main.php'</script>";
		}
		
		else
		{
			echo "<br>";
			echo "You have entered the incorrect email and password. Please try again";
		}

	}
?>

