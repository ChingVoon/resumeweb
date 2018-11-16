<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #111;
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
body{
	background-color: #eaf2f8;
}

</style>
<title>Admin</title>
</head>
<body>

<h1 style ="text-align: center;">Admin Home Page</h1>

<ul>
	  <li><a href="admin_mainpage.php">Home</a></li>
	  <li><a href="list_user.php">List Users Account</a></li>
	  <li><a href="manage_store.php">Manage Store</a></li>
	  <li><a href="manage_forum.php">Manage Forum</a></li> 
	  <li><a href="list_history.php">All Purchase History</a></li>
	  <li><a href="home.php">Logout</a></li>
	</ul>
<article><center>
   <br><input class = "button" value = "List User Account" onclick = "location.href ='list_user.php'">
   <br><input class = "button" value = "Manage Store" onclick = "location.href ='manage_store.php'">
   <br><input class = "button" value = "Manage Forum" onclick = "location.href ='manage_forum.php'">
   <br><input class = "button" value = "All User Purchase History" onclick = "location.href ='list_history.php'">
</center></article>
</body>
</html>
