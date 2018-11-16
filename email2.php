<?php
	include('session.php');
	
	use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once('PHPMailer/src/PHPMailer.php');
    
    $dir = 'testupload/';
    if (is_dir($dir)){
      if ($dh = opendir($dir)){
        while (($file = readdir($dh)) !== false){
         $name = $file;
        }
        closedir($dh);
      }
    }
    
    $email = new PHPMailer();
    $email->From      = $_SESSION['email'];
    $email->FromName  = 'Online Resume Proofreader';
    $email->Subject   = 'Professional Proofreader Service';
    $email->Body      = 'This is the file';
    $email->AddAddress('proof5678@gmail.com');
    $email->AddAttachment($dir.$name,$name);
    $email->Send();
    
     unlink('testupload/'.$name);

    
    echo "<script>location.replace('mainpage.php');</script>";
    
    
?>