<?php

include("connect.php");
include("session.php");
?>
<html>


	<head>
		<Title>RESUME</Title>
		
		<link rel="stylesheet" style="text/css" href="theme01.css"/>
		
	<script>
		function changeCSS(cssFile, cssLinkIndex) {
			var record;
			var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);
			var newlink = document.createElement("link");
			newlink.setAttribute("rel", "stylesheet");
			newlink.setAttribute("type", "text/css");
			newlink.setAttribute("href", cssFile);
			
			document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
			
		}
	</script>
	</head>

<body>
	<div id="background">
	
	<div class = "dropdown" style="float:right;">
		<button class="dropbtn"><img src = "Image/changetheme.png" width = "50px" height = "50px"/></button>
		<div class="dropdown-content"style="right:0;" >
			<a href="#" onclick="changeCSS('theme01.css', 0);">Theme 1</a>
			<a href="#" onclick="changeCSS('theme02.css', 0);">Theme 2</a>
			<?php
				$sql = "SELECT * FROM orders WHERE id = '$login_session'";
				$result = mysqli_query($conn,$sql);
				while($rows = mysqli_fetch_array($result))
				{
					$orderid = $rows['orderid'];
					$sqli = "SELECT orders.orderid, order_item.store_itemid FROM orders INNER JOIN order_item ON orders.orderid = order_item.orderid WHERE orders.orderid = '$orderid'";
					$get = mysqli_query($conn, $sqli);
					if($get->num_rows > 0)
					{
						while($roww = mysqli_fetch_array($get))
						{
							$template = $roww['store_itemid'];
							
							$sqll = "SELECT * FROM store_item where store_itemid = '$template'";
							$gett = mysqli_query($conn, $sqll);
							
							$rowss = mysqli_fetch_array($gett);
							if($rowss['store_itemid'] == 'T003')
							{
								echo '<a href="#" onclick="changeCSS(\'theme03.css\',\'0\');">Theme 3</a>';
							}
							else if ($rowss['store_itemid'] == 'T004')
							{
								echo '<a href="#" onclick="changeCSS(\'theme04.css\',\'0\');">Theme 4</a>';
							}
						}
					}
				}
			?>
		</div>
	</div>
	
	<div id="leftcolumn">
		<div id="header">	
	
						<?php 
							$sql = "SELECT * FROM addresume";
		
							$result = mysqli_query($conn, $sql);  
		
							if($result->num_rows > 0)
							{
								while($row = mysqli_fetch_array($result))
								{
									if($row['id'] === $login_session)
									{
										echo '<img src="data:image;base64,'.$row['photo'].'" id="profilepic"/>'; 
									}
								}
							}
							else
							{
								echo '<script>alert("ERROR! Something Went Wrong!")</script>';
							}	
						?>
			
				<div class="container">
					<h1><?php 
							$sql = "SELECT * FROM addresume";
		
							$result = mysqli_query($conn, $sql);  
		
							if($result->num_rows > 0)
							{
								while($row = mysqli_fetch_array($result))
								{
									if($row['id'] === $login_session)
									{
										echo $row['name'];
									}
								}
							}
							else
							{
								echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
							}	?><br>
					</h1>
				</div>
		</div>
		
		<div class="nav">
		  <a href="mainpage.php">Home</a>
		  <a href="editresume.php">Edit Resume</a>
		  <a href="template.php">View theme</a>
		  <a href="#about">About</a>
		  <a href="#location">Location</a>
		  <a href="#profile">Profiles</a>
		  <a href="#education">Education</a>
		  <a href="#work">Working Experience</a>
		  <a href="#awards">Awards</a>
		  <a href="#skill">Skills</a>
		  <a href="#languages">Languages</a>
		  <a href="#interests">Interests</a>
		  <a href="#references">References</a>
		</div>
	
	<div class="rightside">
		<div id = "email">
			<dl>
			
				<dt><img src = "Image/email.png" alt = "emailicon" id = "imgemail"/><b>Email</b></dt>
				<dd><?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
										echo $row['email'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?></dd>
				
				<dt><img src = "Image/phone.png" alt = "phoneicon" id = "imgphone"/><b>Phone</b></dt>
				<dd><?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['phone'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?></dd>
			</dl>
		</div>
		
		
		<div id = "about">
			<div class = "contents1">
				<h2 class = "about"><img src = "Image/about.png" alt = "abouticon" id = "imgabout"/>  About</h2>
				<p><?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['about'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>
			</div>
		</div>
		<div id = "location">
			<div class = "contents2">
				<h2 class="location"><img src = "Image/location.png" alt = "locationicon" id = "imglocation"/>  Location</h2>
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['address'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>	
			</div>
		</div>
		<div id = "profile">
			<div class = "contents3">
				<h2 class="profile"><img src = "Image/profile.png" alt = "profileicon" id = "imgprofile"/>  Profiles</h2>
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['facebook'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>	
			</div>
		</div>
	</div>
	</div>
	<div id = "rightcolumn">
		<div id = "education">
			<div class = "contents4">
				<h2 class = "education"><img src = "Image/education.png" alt = "educationicon" id = "imgeducation"/>  Education</h2>
					<div>
					<p>
					<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['education'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
					</p>	
					</div>
			</div>
		</div>
		<div id = "work">
			<div class = "contents5">
				<h2 class = "working"><img src = "Image/working.png" alt = "workingicon" id = "imgworking"/>  Work Experience </h2>
					<div>
					<p>
					<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['workexp'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
					</p>	
					</div>
			</div>
		</div>
		<div id = "awards">
			<div class = "contents6">
				<h2 class="awards"><img src = "Image/awards.png" alt = "awardsicon" id = "imgawards"/>  Awards</h2>		
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['awards'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>	
					
			</div>
		</div>
		<div id = "skill">
			<div class = "contents7">
				<h2 class="skill"><img src = "Image/skills.png" alt = "skillsicon" id = "imgskills"/>  Skills</h2>
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['skills'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>
				
			</div>
		</div>
		<div id = "languages">
			<div class = "contents8">
				<h2 class="language"><img src = "Image/language.png" alt = "languageicon" id = "imglanguage"/>  Languages</h2>
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['language'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>	
			</div>
		</div>
		<div id = "interests">
			<div class = "contents9">
				<h2 class="interests"><img src = "Image/interest.png" alt = "interesticon" id = "imginterest"/>  Interests</h2>
				<p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['interest'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p>	
			</div>	
		</div>
		<div id = "references">
			<div class = "contents10">
				<footer><h2 class = "references"><img src = "Image/reference.png" alt = "referenceicon" id = "imgreference"/>  References</h2></footer>
				<footer><p>
				<?php 
						$sql = "SELECT * FROM addresume";
		
						$result = mysqli_query($conn, $sql);  
		
						if($result->num_rows > 0)
						{
							while($row = mysqli_fetch_array($result))
							{
								if($row['id'] === $login_session)
								{
									echo $row['reference'];
								}
							}
						}
						else
						{
							echo '<script>alert("ERROR! Something Went Wrong!")</script>'; 
						}	?>
				</p></footer>
			</div>
		</div>
	</div>
		</div>
	<form name = "set">
		<input type = "hidden" id = "record" value "1"/>
	</form>
	</body>
	
</html>
