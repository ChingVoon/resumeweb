<?php 
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
	width: 100%;
    position: absolute;
}
body{
		background-color:#eaf2f8;
}
.cont{
	background-color: blue;
	color:white;
	text-align:center;
}
#backbtn{
	width: 100px;
	height: 40px;
	font-size: 16px;
	background-color: #A9A9A9;
	}
#del{
	width: 160px;
	height: 40px;
	font-size: 16px;
	background-color: #A9A9A9;
	position:relative;
	top:-40px;
	left:570px;
}

</style>
<title>Edit Forum</title>
</head>
<?php

if(isset($_POST['Delete']))  
	{
		$forumid = $_POST['selected_forumid'];
		foreach ($forumid as $value)
		{	
			$sql = "DELETE FROM forum WHERE forumid = '$value'";
			$result = $conn->query($sql);
		
			if($result)
			{
				echo "<script>window.location.href='manage_forum.php'</script>";
				echo "Forum ID :".$value."is deleted";
		
			}
		}
		
		
	}
?>

<body>
<div class = "cont">
<h2>List of Forum</h2></div>
<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" onclick = "location.href='admin_mainpage.php'" />

<form action = "" method = "POST">
<input type="submit" id = "del" name="Delete" value="Delete Forum">

<?php
if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

$sql = "SELECT * FROM forum ORDER BY forumid ASC";
$result = $conn->query($sql);


	echo "<br>";
	echo "<br>";
	
	echo "<table border = '1'>
<tr>
<th>Check Forum</th>
<th>Forum ID</th>
<th>User Id</th>
<th>Topic</th>
<th>Comment</th>
</tr>";
while($row = mysqli_fetch_assoc($result)){
	echo "<tr>";
	echo "<td>".'<center><input type = "checkbox" name = "selected_forumid[]" id = "forum" value = "'.$row['forumid'].'"/>'."</center></td>";
	
	echo "<td>" .$row["forumid"]."</td>";
	echo "<td>" .$row["id"]."</td>";
	echo "<td>" .$row["topic"]."</td>";
	echo "<td>" .$row["comment"]."</td>";
}
?>


</table>
</form>
</body>
</html>



