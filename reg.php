<?php
$nanme_error = $email_error = $phone_erro = "";
$nanme = $email = $phone = ""; 
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
	{
		$nanme_error = "Name is required";
	}
	else
	{
		$name = test_input($_POST["name"]);
		if(!preg_match("/^[a-zA-Z]*$/", $name))
		{
			$nanme_error = "Only letters and white space all";
		}
		else
		{
			print($name);
		}
	}
}
function test_input($data)
{
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;		
}
?>
