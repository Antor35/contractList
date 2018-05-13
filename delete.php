<?php
	$ID = $_GET['id'];
	$server = 'localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='contractList';

	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}
// Delete From File
	 $target_dir = "uploads/";
	 Require 'dataBaseConnection.php';
     $sql = "SELECT image FROM contracts WHERE id = '$ID' ";
     $result = mysqli_query($conn,$sql);
     $row = mysqli_fetch_assoc($result);
     $preImg = $row['image'];
     $un = unlink($preImg);

/// Delete From DataBase 
	$sql = "DELETE FROM contracts WHERE id='$ID' "; 
	$result = mysqli_query($conn,$sql);
	if($result === true){
		header('location:createContract.php');
			exit();
	}
?>