<!DOCTYPE html>
<html>
<head>
	<title>New Database for admins</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpmyadmin";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "CREATE TABLE Admintable (
username VARCHAR(30) NOT NULL UNIQUE,
email VARCHAR(50) NOT NULL UNIQUE,
password MEDIUMTEXT NOT NULL

)";


if ($conn->query($sql)) {
    echo "Table Admintable created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
</body>
</html>