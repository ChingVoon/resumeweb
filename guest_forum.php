<?php
include('connect.php');
?>
<html>
<head>
<style>
body{
	background-color:  #e8f6f3 ;
}
.chatbox {
	margin: auto;
    width: 50%;
    border: 3px solid #73AD21;
    padding: 10px;
    max-width: 700px;
    padding: 0 20px;
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
	font-size: 23px;
}
.posted
{
	float: right;
    color: #aaa;
}
.container {
	margin: auto;
    border: 3px solid #73AD21;
    padding: 10px;
    max-width: 90%;
    padding: 0 20px;
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
	
}
input[type=text]{
	margin: 0px;
	width: 100%;
	height: 35px;
	background-color: #fefefe;
	padding-left:15px;
	border: 1px solid #888;
}
.big{
	color:#696969;
	font-weight: bold;
	font-size:25px;
}
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

</style>	
<script>
function forum_validate(){
			
			if(document.forumm.topic.value == "")
			{	
				alert("Please enter topic to post forum.")
				document.forumm.topic.focus();
				return false;
			}
			else if(document.forumm.comment.value == "")
			{	
				alert("Please give some comment.")
				document.forumm.comment.focus();
				return false;
			}
		}

</script>
</head>
<body>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="#about">About</a></li>
  <li><a href="#location">Location</a></li>
  <li><a href="#ourservices">Our Services</a></li>
  <li><a href="guest_forum.php">Forum</a></li>
</ul>
<br>
<br>
<?php

if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	
$sql = "SELECT * FROM forum ORDER BY forumid ASC";
$result = $conn->query($sql);

while($row = mysqli_fetch_assoc($result)){
	echo "<div class = chatbox>";
	echo "Topic : " .$row["topic"]."<br>";
	echo "Comment : " .$row["comment"]."<br>";
	echo "<br><div class = posted> Posted by " .$row["id"]."<br>";
	echo "</div></div><br><br>";
	
}
?>

<form name="forumm" method="POST" action="guest_addforum.php" onsubmit = "return forum_validate()">
	<div class = container><center><h2>Add Forum as Guest</h2></center>
	<div class = big>Topic</div><br> <input type="text" name="topic" placeholder = "Discuss a topic."><br><br>
	<div class= big>Comment</div><br>
	<input type="text" name="comment" placeholder = "Please give some comment.">
	
	<div><input type="hidden" name="id" value="anonymous"></div><br>
	<center><input type="submit" name="post_btn" value="Post"></center>
	</div></div></div>
</form>

</body>
</html>
