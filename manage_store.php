<html>
<head>
<style>
body{
	margin:auto;
    max-width: 500px;
    background: #8ab0cc;
    padding: 10px;
}

h1{
	position:relative;
	top:50px;
	left:65px
	
}

input[type=submit]{
	width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=text]{
	width: 100%;
    background-color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.box{
	margin:auto;
	border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
	width:380px;
	position:relative;
	top:80px;
}

</style>
</head>
<?php
	include('connect.php');
	
	if(isset($_POST['addbtn']) && isset($_FILES['image']))
	{	
		$image = addslashes($_FILES['image']['tmp_name']);
		if(getimagesize($image) == FALSE)
		{
			echo "Please select an image.";
		}
		else
		{
			
			
			/* $name = addslashes($_FILES['image']['name']); */
			$image = file_get_contents($image);
			$image = base64_encode($image);
			
			$check = false;
			
			$sql = "SELECT * FROM store_item";
			$result = mysqli_query($conn, $sql);
			
			while($row = mysqli_fetch_array($result))
			{
				if($itemid = $row['store_itemid'])
				{
					$check = false;
					break;
				}
				$check = true;
			}	
			
			if ($check = true && substr($_POST['itemid'], 0,1) === 'B' && strlen($_POST['itemid']) == 4)
			{
				$id = $_POST['itemid'];
				$itemname = $_POST['name'];
				$price = $_POST['price'];
					
				$addsql = "INSERT INTO store_item(store_itemid, item_name, item_price, imageitem) VALUES ('$id', '$itemname', '$price', '$image')";
					
				if(mysqli_query($conn,$addsql))
				{	
					echo '<script type="text/javascript">alert("Successfully Add New Item to The Store")</script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("The Book ID Already Exist!")</script>';
				}
			}
			else
			{
				echo '<script>alert("Item Id Already Exists! Please change the item id.")</script>';
				echo '<script type="text/javascript">alert("Please insert correct data form.")</script>';
			}
		}
	}
	else if(isset($_POST['addbtn']))
	{
		echo '<script type="text/javascript">alert("Please Fill In All the information.")</script>';
	}
	if(isset($_POST['backbtn']))
	{
		echo "<script>window.location.href='admin_mainpage.php'</script>";
	}
?>
	<h1>Add Book To Online Store</h1>
	
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype = "multipart/form-data">
	
	<div class="box">
	Item Id ['B00X']<br> <input type = "text" name = "itemid" /><br>
	Item Name<br><input type = "text" name = "name" /><br>
	Item Price (RM)<br><input type = "text" name = "price" /><br>
	Image<br><input type = "file" name = "image" /><br>
	<input type = "submit" name = "addbtn" id = "addbtn" value = "Add New Book"/>
	<div id = "buttonback">
		<input type = "submit" name = "backbtn" id = "backbtn" value = "Back" />
	</div>
	</div>
</form>
