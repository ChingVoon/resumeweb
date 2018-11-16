<!DOCTYPE html>
<html>
<head>
<title> Main Page </title>
<style>

header, footer {
	padding: 5px;
	color: black;
	font-family: "Comic Sans MS", cursive, sans-serif;
	background-color:  #aed6f1  ;
	clear: left;
	text-align: center;
}

.button {
	background-color:  #fcf3cf ;
	border: 1px solid;
	border-radius: 5px;
	color: black;
	padding: 15px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	margin: 4px 2px;
	cursor: pointer;
}

.button:hover  {
	background-color: #fef9e7 ;
}

body{
	background-color:   #eaf2f8;
}

.dropbtn {
	background-color: #aed6f1;
	padding: 5px;
	font-size: 16px;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

.dropdown {
	position: relative;
	left: 530px;
	bottom : 90px;
	display: inline-block;
}

.dropdown-content {
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 160px;
	box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
	z-index: 1;
}

.dropdown-content a {
	color: black;
	padding: 12px 16px;
	text-decoration: none;
	display: block;
}

.dropdown-content a:hover {
	background-color: #CCCCCC
	}

.dropdown:hover .dropdown-content {
	display: block;
}

.dropdown:hover .dropbtn {
	background-color: #aed6f1;
}
</style>
</head>

<body>
<header>
	<h1 style="text-align: center;">Main Page</h1>
<div class="dropdown">
		<button class="dropbtn"><img src = "Image/setting.png" alt = "settingicon" id = "imgsetting"/></button>
			<div class="dropdown-content">
				<a href="editprofile.php"><img src = "Image/editprofile.png" alt = "editprofileicon" id = "imgeditprofile"/> Edit Profile</a>
				<a href="logout.php"><img src = "Image/logout.png" alt = "logouticon" id = "imglogout"/> Logout</a>
			</div>
</header>

<center>
<article>
   <br><input class = "button" value = "Online Store" onclick = "location.href ='storepage.php'">
   <br><input class = "button" value = "View Resume" onclick = "location.href ='resume1.php'">
   <br><input class = "button" value = "Edit Resume" onclick = "location.href ='editresume.php'">
   <br><input class = "button" value = "Forum" onclick = "location.href ='user_forum.php'">
   <br><input class = "button" value = "Proof Reader" onclick = "location.href ='payment.php'">
</article>
</div>
</center>
</body>
</html>
