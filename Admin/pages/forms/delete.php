<?php
	include '../../../database.php';  
  	$data = new Databases;
	$id = $_GET['id'];
	$table = $_GET['table'];
	echo($table);
	$condition_arr = array('id'=>$id);
	$data->deleteData($table,$condition_arr);
	header("location:$table.php");

?>