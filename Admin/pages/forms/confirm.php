<?php
	include '../../../database.php';  
  	$data = new Databases;
	$id = $_GET['id'];
	$table = $_GET['table'];
	echo($table);
	$condition_arr = array('status'=>1);
	$data->updateData($table,$condition_arr,$id);
	header("location:$table.php");

?>