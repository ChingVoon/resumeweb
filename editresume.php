<?php
	include('connect.php');
	include('session.php');
?>
<html>
<?php
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	if(isset($_POST['Save']) && isset($_FILES['photo']))
	{
		$photo = addslashes($_FILES['photo']['tmp_name']);
		
		if(getimagesize($photo) == FALSE)
		{
			echo "Please upload your photo.";
		}
		else
		{
			$photo = file_get_contents($photo);
			$photo = base64_encode($photo);			
			
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$address= $_POST['address'];
			$facebook= $_POST['facebook'];
			$about = $_POST['about'];
			$education = $_POST['education'];
			$workexp = $_POST['workexp'];
			$awards = $_POST['awards'];
			$skills = $_POST['skills'];
			$language = $_POST['language'];
			$interest = $_POST['interest'];
			$reference = $_POST['reference'];
			$id = $login_session;

			$sql = "UPDATE addresume SET photo = '$photo', name ='$name', email = '$email', phone = '$phone', address = '$address',  facebook = '$facebook', about= '$about',
			education = '$education', workexp = '$workexp', awards = '$awards', skills = '$skills', language = '$language', interest = '$interest', reference = '$reference' WHERE id = '$login_session'" ; 

			if (mysqli_query($conn, $sql)) 
			{
				echo  "<script type='text/javascript'>alert('Your resume is updated succesfully!')</script>";	
				echo "<script>window.location.href='resume1.php';</script>";
			} 
			else 
			{
				echo  "<script type='text/javascript'>alert('Fail to add')</script>";	
			}
		}
	}
?>

<head>
	<title>Edit Resume</title>
<style>
header {
	color: black;
	font-family: "Comic Sans MS", cursive, sans-serif;
	background-color: #a3e4d7  ;
	text-align: center;
	border: 2px dashed;
	border-radius: 5px;
	margin: 30px;
}

#welcome{
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-variant: small-caps;
}


#personal{
	color: black;
	padding: 5px;
	text-align: center;
	background-color: #e8f6f3  ;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	font-variant: small-caps;
	font-size: 20px;
	margin: 80px;
	border: 2px solid;
	border-radius: 10px;
	float: left;
	width: 85%;



}


.button {
	position: relative;
    display: block;
    padding: 12px;
	float: left;
    color: black;
    margin-top: -40px;
    background: #a3e4d7  ;
	font-size: 15px;
	font-weight: bold;
    text-align: center;
	cursor: pointer;
    border: 1px solid;
	border-style: inset;
    border-radius: 5px;


}

.button:hover {background-color: #d1f2eb  }

.button:active {

  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

input[type=submit]{
	position: relative;
		display: block;
		padding: auto ;
		color: black;
		margin: 0 auto;
		background: #a3e4d7    ;
		font-size: 20px;
		text-align: center;
		font-style: normal;
		cursor: pointer;
		border: none;
		border-radius: 5px;
		margin-bottom: 20px;
	 box-shadow: 0 3px #999;

}


body{
	background-color:  #e8f6f3 ;
}
</head>
</style>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype = "multipart/form-data">
<header>
	<h1>Your Resume </h1>
		<div id = "welcome">
			<p><b> ID: <?php echo $login_session;?></b></p>
			
		</div>
</header>
<?php	
		$id = $login_session;
		$sql = "SELECT * FROM addresume where id = '$id'";
		
		$result = mysqli_query($conn,$sql);
		while($row = mysqli_fetch_assoc($result))
		{
			$POSTphoto = $row['photo'];
			$POSTname = $row['name'];
			$POSTemail = $row['email'];
			$POSTphone = $row['phone'];
			$POSTaddress= $row['address'];
			$POSTfacebook= $row['facebook'];
			$POSTabout = $row['about'];
			$POSTeducation = $row['education'];
			$POSTworkexp = $row['workexp'];
			$POSTawards = $row['awards'];
			$POSTskills = $row['skills'];
			$POSTlanguage = $row['language'];
			$POSTinterest = $row['interest'];
			$POSTreference = $row['reference'];
			$POSTid  = $row['id'];
		
			echo "<div id = 'personal'>";
			echo "<p>Photo: ".'<input type = "file" name = "photo"/>'.'<img src = "data:image;base64,'.$row['photo'].'" height="300" width="250"/>'."</p>";
			echo "<p>Name:".' <input type="text" name="name" value="'.$POSTname.'">'."</p>";
			echo "<p>Email: ".'<input type="email" name="email" value="'.$POSTemail.'">'."</p>";
			echo "<p>Phone: ".'<input type="text" name="phone" value="'.$POSTphone.'">'."</p>";
			echo "<p>Address: ".'<input type="text" name="address" value="'.$POSTaddress.'">'."</p>";
			echo "<p>Facebook:".' <input type="text" name="facebook" value="'.$POSTfacebook.'">'."</p>";
			echo "<p>About: ".'<input type="text" name="about" value="'.$POSTabout.'">'."</p>";
			//echo "</div>";
			//echo "<div id = 'details'>";
			echo "<p>Education: ".'<input type="text" name="education" value="'.$POSTeducation.'">'."</p>";
			echo "<p>Work Experience: ".'<input type="text" name="workexp" value="'.$POSTworkexp.'">'."</p>";
			echo "<p>Awards:".' <input type="text" name="awards" value="'.$POSTawards.'">'."</p>";
			echo "<p>Skills: ".'<input type="text" name="skills" value="'.$POSTskills.'">'."</p>";
			echo "<p>Language: ".'<input type="text" name="language" value="'.$POSTlanguage.'">'."</p>";
			echo "<p>Interest: ".'<input type="text" name="interest" value="'.$POSTinterest.'">'."</p>";
			echo "<p>Reference: ".'<input type="text" name="reference" value="'.$POSTreference.'">'."</p>";
			echo '<input type = "submit"  name = "Save" value = "Save" >';
			echo "</div>";
		}	
?>

			<input class ="button" value="Back" onclick="location.href ='mainpage.php'">



</form>		
</body>
</html>