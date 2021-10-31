<?php
	include 'database.php';  
	$data = new Databases;   
	session_start();
	$email = $_SESSION["email"];
	$condition_arr = array('email'=>$email);
	$user = $data->getData('registration','*',$condition_arr);
	$register_id  = $user[0]['id'];
	echo $register_id;


	$user_arr = array('register_id'=>$register_id);
	$newuser = $data->getData('profile','*',$user_arr);
	print_r($user_arr);


	if($newuser!=0)
	{
		header("location:profileedit.php");
	}
	else
	{
		header("location:profile.php");
	}

?>