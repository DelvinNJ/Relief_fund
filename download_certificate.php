<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Relief";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}


	$id = $_GET['id'];

	$sql = "SELECT * FROM payment where id = $id";
	$result = $conn->query($sql);


	foreach($result as $row)
	{

		$sql = "SELECT pancard FROM registration where id = " . $row['donor_id'];
		$pancard = $conn->query($sql);
		$value = mysqli_fetch_row($pancard);


	    header('content-type:image/jpeg');
		$font = realpath('arial.ttf');
		$image = imagecreatefromjpeg('certificate.jpg');
		$color = imagecolorallocate($image, 0, 0, 0);
		
		// imagettftext(image, size, angle, x, y, color, fontfile, text)

		$bill_no =  $row['bill_no'];
		imagettftext($image, 42, 0, 595, 895, $color, $font, $bill_no);


		$amount =  $row['amount'];
		imagettftext($image, 42, 0, 2100, 1200, $color, $font, $amount);

		$name =  $row['name'];
		imagettftext($image, 42, 0, 1100, 1300, $color, $font, $name);


		$pancard =  $value[0];
		imagettftext($image, 42, 0, 1050, 1560, $color, $font, $pancard);



		$date =  $row['date'];
		imagettftext($image, 42, 0, 600, 1955, $color, $font, $date);
		
		imagejpeg($image);
		imagedestroy($image);


	}


?>


