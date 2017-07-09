<!DOCTYPE html>
<html>
<head>
	<title>Admin SignUp</title>
</head>
<body>
Welcome <?php echo $_POST["firstname"]."  ". $_POST["lastname"]; ?><br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";
$con=mysqli_connect($servername,$username,$password,$dbname);


 if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $firstname =$_POST["firstname"];
  $lastname =$_POST["lastname"];
  $email =$_POST["email"];
  $pwd = $_POST["pwd"];
}
 if ($pwd) {
 	$salt = "NITRKL";

    $hash= hash("sha256",$pwd.$salt);
      $created = time();
      $sql = "INSERT INTO `users` VALUES('$firstname','$lastname','$email','$hash')";
      $r = mysqli_query($con,$sql);
    }

?>
</body>
</html>