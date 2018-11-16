<?php
	include('connect.php');
	include('session.php');
?>
<html>


<?php
	if(isset($_POST['upload']))
	{
		$targetfolder = "testupload/";

		$targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

		$ok=1;

		$file_type=$_FILES['file']['type'];

		if ($file_type=="application/pdf")
		{
			if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
			{
				echo "The file ". basename( $_FILES['file']['name']). " is uploaded";
				echo "<script>window.location.href='payment.php';</script>";
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
	}
?>

<head>
	<title>Proof Reader </title>
<style>
header, footer {

		clear: left;
		text-align: center;
}

.button {
		background-color:  #fcf3cf ;
		border: 1px solid;
		border-radius: 5px;
		color: black;

		text-align: center;
		text-decoration: none;
		display: inline-block;
		font-size: 16px;
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		margin: 4px 2px;
		cursor: pointer;
}

body{
	background-image:url("Image/read.jpg");
	background-repeat: no-repeat;
	text-align: center;
}

label{
	font-size:30px;
	font-family:fantasy;
}

h1{
	font-size:40px;
	font-family:fantasy;
}

input(type=file){
	font-family:fantasy;
	font-size:20px;
}
</style>
</head>


<body>
<div>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
		<header>
			<h1>Check Your Grammar</h1>
			<p><b> ID: <?php echo $login_session;?></b></p>
		</header>	
			<p>
				<label for='uploaded_file'>Select A File To Upload:</label> <br>
				<input type="file" name="file"/>
			</p>
		<input type = "submit" name = "upload" value = "Upload" />
	</form>
</div>
</body>
</html>