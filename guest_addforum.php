<?php
	include("connect.php");
	include("guest_forum.php");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	
	if(isset($_POST['post_btn']))  
	{	
		$id = $_POST['id'];
		$topic = $_POST['topic'];
		$comment = $_POST['comment']; 
		
		
		$sql = "INSERT INTO forum(id, topic, comment) VALUES('$id', '$topic', '$comment')";			
		$result = $conn->query($sql);
		
		date_default_timezone_set("Asia/Kuching");
		echo date("h:i:sa"); //print time
		
		if($result) 
		{
			echo "<script>window.location.href='guest_forum.php'</script>";
			
		} 
		else 
		{
			echo "<br>";
			echo "<script type='text/javascript'>alert('Forum not submitted')</script>";
			echo "<script>window.location.href='guest_forum.php'</script>";
		}
	}
?>

