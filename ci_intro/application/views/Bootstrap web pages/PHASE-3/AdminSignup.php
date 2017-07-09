<!DOCTYPE html>
<html>
<head>
	<title>Admin SignUp</title>
</head>
<body>
Welcome <?php echo $_POST["username"]; ?><br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";
$con=mysqli_connect($servername,$username,$password,$dbname);


 if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $username =$_POST["username"];
  $email =$_POST["email"];
  $pwd = $_POST["pwd"];
}
 if ( $username && $pwd ) {
 	$salt = "exaggeration";

    $hash= hash("sha256",$pwd.$salt);
      $created = time();
      $sql = "insert into `adminTable` values('".$username."','".$email."','".$hash."')";
      $r = mysqli_query($con,$sql);
    }

?>
</body>
</html>