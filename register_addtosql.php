<?php
	include('connect.php');
	include('home.php');
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$nric = $_POST['nric'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$id = $_POST['id'];
	
	$sql = "SELECT * FROM users where email='$email'";
	$result = $conn->query($sql);
			
	if($result->num_rows == 0) 
	{
		echo ("Sign Up Successful. Your Id is ".$id);
		
		//$password = MD5($password);  
				
		$sql = "INSERT INTO users(id, first_name, last_name, nric, email, password) VALUES('$id', '$first_name', '$last_name', '$nric', '$email', '$password')";

		if ($conn->query($sql) == TRUE) 
		{			
			$sqli = "INSERT INTO addresume(resumeid, id, email) VALUES((SELECT MAX(resumeid)+1 FROM addresume cust),'$id', '$email')";
			mysqli_query($conn, $sqli);
			echo "<br>";
			echo  "<script type='text/javascript'>alert('Your have succesfully registered. Please proceed to login!')</script>";		
			
		}
	} 
	else 
	{
		echo "<br>";
		echo "<script type='text/javascript'>alert('The email already exists!')</script>";

	}
	
	
?>