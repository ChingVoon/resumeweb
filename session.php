<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['id'];
   
   $ses_sql = mysqli_query($conn,"select id from users where id = '$user_check' ");
   
   $row = mysqli_fetch_assoc($ses_sql);
   
   $login_session = $row['id'];
   
   if(!isset($login_session)){
	  mysql_close($conn);
	  echo "<script>window.location.href='user_mainpage.php'</script>";
   }
?>