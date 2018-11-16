<!DOCTYPE html>
<html>
<head>
<script>
	function validate() {
		var first_name = document.getElementById('first_name').value;
		var last_name = document.getElementById('last_name').value;
		var nric = document.getElementById('nric').value;
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;
		var password2 = document.getElementById('password2').value;
		var fname = first_name.split(" ");
		var lname = last_name.split(" ");
		var newid = "";
		
		if(first_name == "" || last_name  == "" || nric  == "" || email  == "" || password  == "" || password2  == "")
		{
			alert('Please Fill In All Fields');
			return false;
		}
		else if (password == password2)
		{
			if (lname[0] == "Binti"|| lname[0] == "Bin"|| lname[0] == "Anak")
			{
				for (var i = 0; i < fname.length; i++ )
				{
					fname[i] = fname[i].toLowerCase();
					newid = newid + fname[i].charAt(0);
				}
				for ( var j = 1; j < lname.length; j++)
				{
					lname[j] = lname[j].toLowerCase();
					newid = newid + lname[j];
				}
				newid = newid + nric.slice(-4);
			}
			else
			{
				for (var i = 0; i < fname.length; i++ )
				{
					fname[i] = fname[i].toLowerCase();
					newid = newid + fname[i].charAt(0);
				}
				for ( var j = 0; j < lname.length; j++)
				{
					lname[j] = lname[j].toLowerCase();
					newid = newid + lname[j];
				}
				newid = newid + nric.slice(-4);
			}
			document.tryf.id.value = newid;
			 return true;
		}
		else
		{
			alert("Password and confirm password are not match. Please enter again.");
			return false;
		}
	}	

function login_validate(){
			
			if(document.loginn.email.value == "")
			{	
				alert("Please enter your Email to login.")
				document.loginn.email.focus();
				return false;
			}
			else if(document.loginn.password.value == "")
			{	
				alert("Please enter your Password.")
				document.loginn.password.focus();
				return false;
			}
		}	
</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>

body {font-family: Arial, Helvetica, sans-serif;
background-image: url("Image/res.PNG");}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}


.container {
    padding: 16px;
}

.modal#email{
	background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 10% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 10% from the bottom and centered */
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
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

h2{
	 color: white;
	font-weight:bold;
	background-color:#065BFE;
}

.container3{
	position: relative;
	left:20px;
	width:35%;
    padding: 10px;
	font-size:20px;	
	background-color: #fefefe;
    border: 1px solid #888;
}

.container1 {
    padding: 16px;
	text-align: center;
	
}
.container2 {
	text-align: center;
	background-color:#80bfff;

}
.container_forum {
  text-align: center;
  background-color:#ebebe0;
  border-radius: 0px 0px 4px 4px;
  padding: 5px;
  font-size: 20px;
  text-decoration:  none;
}
.copyright{
	text-align: center;
	background-color:#ebebe0;
}
</style>
</head>

<body>

	<ul>
	  <li><a href="home.php">Home</a></li>
	  <li><a href="#about">About</a></li>
	  <li><a href="#location">Location</a></li>
	  <li><a href="#ourservices">Our Services</a></li>
	  <li><a href="guest_forum.php">Forum</a></li> 
	  <li><a href="#contact">Contact Us</a></li>
	</ul>
	
	<br>

	<div class = "container1">
		<h3>Online Resume Template . High Quality English Proofreading & Editing Resume Service . Book to Improve Resume</h2>
	</div>
	
	<div class = "container3">
		
		<form name = "loginn" method = "POST" action = "login_addtosql.php" onsubmit = "return login_validate()">
			<center><h3>Login</h3></center>
			<div>Email: <br><input type="text" name="email" placeholder="Enter Email"></div>
			<div><br>Password: <input type="password" name="password" placeholder="Enter password"></div>
			<div><input type="submit" name="login_btn" value="Login"></div>
		</form>
		
	</div>
		<button onclick="document.getElementById('id01').style.display='block'" style="width:auto; text-align: center; position: relative;left:20px;">Sign Up</button>
		
	<div id="id01" class="modal">
  <form class="modal-content animate" name = "tryf" method="POST" action="register_addtosql.php" onsubmit = "return validate()">
    
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
	<div class="container">
		
			<center><h3>Sign Up</h3></center>
			<div>First Name: <input type="text" name="first_name" id="first_name" placeholder="Please enter your first name"></div>
			<div>Last Name: <input type="text" name="last_name" id="last_name" placeholder="Please enter last name"></div>
			<div>NRIC: <input type="text" name="nric" id="nric" placeholder="Please enter your IC number"></div>
			<div>Email: <br><input type="text" name="email" id="email" placeholder="Please enter your email"></div>
			<br><div>Password: <input type="password" name="password" id="password" placeholder="Please enter your password"></div>
			<div>Confirm Password: <input type="password" name="password2" id="password2" placeholder="Re-enter your password"></div>
			<div><input type="hidden" name="id" id ="id" value=""></div>
</div>
	<div class="imgcontainer">
     <div><input type="submit" name="register_btn" value="Register"></div>
    </div>
</form>
</div>
	
	<div class = "container2">
	<div id = "ourservices">
	<h2>Our Services</h2>
	<h3>Online Resume Templates</h3>
	<div>Sign up and Check out our professional online resume temmplates</div>
	<div>Start creating a resume with professionally designed templates in three simple steps</div>
	<div>Fill in your details using our simple form</div>
	<div>Choose one of our professionally designed resume</div>
	<div>Start applying for jobs today!</div>
	<br>
	<h3>Easy & Quick Proofreading Services</h3>
	<div>Make your Resume and Job Application error free and polished with our professional proofreading and editing services. Instantly Proofread Your Text And Correct Grammar & Punctuation</div>
	<div>Few easy steps below</div>
	<div>Sign Up and Login </div>
	<div>Upload Files to Proofread</div>
	<div>Receive resume in few days time</div>
	</div>

	<div id = "location">
	<h2>Location</h2>
	<div>Our Store locates at<br>Lot 1234<br>Unigarden Lorong 12<br>93320 Samarahan<br>Kuching Sarawak<br>Malaysia</div>
	</div>
	<div id = "contact">
	<h2>Contact Us</h2>
	<h4>Online Resume Customer Care</h4>
	<div>+60123456789</div>
	<div>Monday - Sunday</div>
	<div>24 hours Service</div>
	<br>
	</div>
	<div class ="container_forum">
		<a href="guest_addforum.php">Forum</a>
	</div>
	</div>
	<p class = "copyright">© 2018. All rights reserved.</p>
	
	

</body>
</html>
