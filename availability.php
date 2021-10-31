<?php
$servername = "localhost";
$database = "Relief";
$username = "root";
$password = "";

// Create connection

$connect = mysqli_connect($servername, $username, $password, $database);

if(isset($_POST["email"]))
{
	$sql = "SELECT * FROM registration where email ='".$_POST["email"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}




if(isset($_POST["phone"]))
{
	$sql = "SELECT * FROM registration where phone ='".$_POST["phone"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}


if(isset($_POST["aadhar"]))
{
	$sql = "SELECT * FROM registration where aadhar ='".$_POST["aadhar"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}

if(isset($_POST["pancard"]))
{
	$sql = "SELECT * FROM registration where pancard ='".$_POST["pancard"]."'";

	$result = mysqli_query($connect, $sql);
	echo mysqli_num_rows($result);
	
}

?>