<?php
	$id = $_GET['id'];
	$server = 'localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='contractList';

	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}

	/*
	 * Delete form local file
	 */
	$sql1 = "SELECT image FROM contracts Where id = '$id' ";
	$res = mysqli_query($conn,$sql1);
	$name = mysqli_fetch_assoc($res);
	unlink($name["image"]);

	//die();
	/*
	 * Delete form Database
	 */
	$sql = " DELETE FROM contracts WHERE id='$id' "; 
	$result = mysqli_query($conn,$sql);
	if($result === true){
		header('location:createContract.php');
			exit();
	}
?>