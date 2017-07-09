<!DOCTYPE html>
<html>
<head>
	<title>Login server script</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";
$con=mysqli_connect($servername,$username,$password,$dbname);

   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['pwd']); 
      	$salt = "exaggeration";

    $hash= hash("sha256",$mypassword.$salt);
     
      $sql = "select * from admintable where username = '".$myusername."' and password = '".$hash."'";
     
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      //$active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
        $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }

?>
</body>
</html>