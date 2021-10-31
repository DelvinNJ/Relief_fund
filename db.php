<?php
$servername = "localhost";
$database = "Relief";
$username = "root";
$password = "";

// Create connection

$connect = mysqli_connect($servername, $username, $password, $database);

// Check connection

if ($connect->connect_error) 
{
	die("Connection failed: " . $connect->connect_error);
}
else{
	echo "Connection Success!";
}


?>



