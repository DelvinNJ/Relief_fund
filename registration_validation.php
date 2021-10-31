<?php
	include("db.php"); 
	$fnanme_error = $lname_error = $email_error = $password_error = $cpassword_error = $phone_error = $aadhaar_error = $pancard_error = "" ;

	$fname = $lname = $email = $password = $cpassword = $phone= $aadhaar = $pancard = ""; 

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// First Name
		if (empty($_POST["fname"]))
		{
	    	$fnanme_error = "First Name is Required";
	  	}
	  	else
	  	{
	    	$fname = test_input($_POST["fname"]);
		    if (!preg_match("/^[a-zA-Z-' ]*$/",$fname))
		    {
		      $fnanme_error = "Only letters and white space all";
		    }
	  	}
	  	// Last Name
	  	if (empty($_POST["lname"]))
	  	{
	    	$lname_error = "Last Name is Required";
	  	}
	  	else
	  	{
	    	$lname = test_input($_POST["lname"]);
	    	if (!preg_match("/^[a-zA-Z-' ]*$/",$lname))
	    	{
	      		$lname_error = "Only letters and white space all";
	    	}
	  	}
	  	// Email 
	  	if (empty($_POST["email"]))
	  	{
	    	$email_error = "Email Address is Required";
	  	}
	  	else
	  	{
	    	$email = test_input($_POST["email"]);
	    	$query = "SELECT * FROM users where email='$email'";
	    	$result = mysqli_query(connect,$query);
	    	if($result->num_rows==0)
	   		{
	   			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	   			{
	      			$email_error = "Invalid email format";
	    		}
	    	}
	    	else
	    	{
	    		$email_error = "Email-id is Already exist";
	    	}	
	  	}
	  // Phone 
	  	if (empty($_POST["phone"]))
	  	{
	   		$phone_error = "Phone Name is Required";
	  	}
	  	else
	  	{
	    	$phone = test_input($_POST["phone"]);
	    	if(!preg_match("/^[0-9]{10}+$/", $phone))
	    	{
	      	$phone_error = "Invalid Phone Number";
	    	}
	  	}
	  //Password
	  	if (empty($_POST["password"]))
	  	{
	    	$password_error = "Password is Required";
	  	}
	  	else
	  	{
			$password = test_input($_POST["password"]);
			$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,15}$/';
			if(!preg_match($pattern, $password))
	    	{
	      		$password_error = "Password between 8 to 15 characters 
	      		<br>At least one uppercase letter and lower case letter
	      		<br>At least one number (digit)
	      	<br>At least one of the following special characters !@#$%^&*-";
	    	}
	  	}
	  	//Confirm Password
	  	if (empty($_POST["cpassword"]))
	  	{
	    	$cpassword_error = "Confirm Password is Required";
	  	}
	  	else
	  	{
	    	$cpassword = test_input($_POST["cpassword"]);
	    	$pattern = '/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,15}$/';
	    	if(!preg_match($pattern, $cpassword))
	    	{
	      		$cpassword_error = "Password between 8 to 15 characters 
	      		<br>At least one uppercase letter and lower case letter
	      		<br>At least one number (digit)
	      		<br>At least one of the following special characters !@#$%^&*-";
	    	}
	  	}
	    //Aadhar
	  	if (empty($_POST["aadhaar"]))
	  	{
	    	$aadhaar_error = "Aadhar Number is Required";
	  	}
	  	else
	  	{
	    	$aadhaar = test_input($_POST["aadhaar"]);
	    // if(!preg_match("/^[a-zA-Z]*$/", $aadhaar))
	    	if(!preg_match("/[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/", $aadhaar))
	    // if(!preg_match('/^[2-9]{1}[0-9]{3}\\s[0-9]{4}\\s[0-9]{4}$/', $aadhaar)) 
	    	{
	      		$aadhaar_error = "Invalid Aadhar Number
	      		<br> It should have 12 digits.
	      		<br>It should not start with 0 and 1.
	      		<br>It should not contain any alphabet and special characters.
	      		<br>It should have white space after every 4 digits.";

	    	}
	  	}
	    //Pan card
	  	if (empty($_POST["pancard"]))
	  	{
	    	$pancard_error = "Pan Card Number is Required";
	  	}
	  	else
	  	{
	    	$pancard = test_input($_POST["pancard"]);
	    	if(!preg_match("/[A-Z]{5}[0-9]{4}[A-Z]{1}/", $pancard))
	    	{
	      		$pancard_error = "It should be ten characters long.
	      		<br>The first five characters should be any upper case alphabets.
	      		<br>The next four-characters should be any number from 0 to 9.
	      		<br>The last(tenth) character should be any upper case alphabet.
	      		<br>It should not contain any white spaces.";
	    	}
	  	}
	  	if ($fnanme_error == '' and $lname_error == '' and $email_error == '' and $password_error == '' and $cpassword_error == '' and $phone_error == '' and $aadhaar_error == '' and $pancard_error == '' )
	  	{
	    	$status = 1;
	    	$password = md5($password);  
	    	$query = "INSERT INTO users (fname, lname, email, password, phone, aadhaar, pancard, status) VALUES('$fname', '$lname','$email','$password','$phone','$aadhaar','$pancard',$status)";
	     
	    	if($connect->query($query) === TRUE)
	    	{
	      		echo("<script>alert('Registration Done')</script>");
	      		$fname = $lname = $email = $password = $cpassword = $phone= $aadhaar = $pancard = "";
	    	}
	     	else
	    	{
	      		echo("Error:".$query." ".$connect->error);
	    	}
	  	}
	  	//End
	}
	function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;   
	}
?>