<?php
	session_start();
	$ID = $_POST['id'];
	if($_FILES['img']['name']){
		$imgErr="";
		$name = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		if(isset($name)){

			if(empty($name)){

				$imgErr = "please Select a Photo !";
				$_SESSION['imgErr'] = $imgErr;
			}
		else{

			$target_dir = "uploads/";
			$t = uniqid();
			$target_file = $target_dir.$t.basename($_FILES['img']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			$check = getimagesize($_FILES['img']['tmp_name']);
			if($check === false){

				$imgErr = "File in not a image!";
				$_SESSION['imgErr'] = $imgErr;

			}
			else if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"&& $imageFileType !== "gif"){

				$imgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$_SESSION['imgErr'] = $imgErr;
			}
			 
			  	move_uploaded_file($tmp_name, $target_file);

			  	$updateImg = $target_file;
			  	Require 'dataBaseConnection.php';
                $sql = "SELECT image FROM contracts WHERE id = '$ID' ";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $preImg = $row['image'];
                unlink($preImg);

		}
	}


	if($imgErr!==""){
		$_SESSION['imgErr'] = $imgErr;
		header("location:edit.php?id=$ID");
		exit();
	}
	}
	else{
		Require 'dataBaseConnection.php';
        $sql = "SELECT image FROM contracts WHERE id = '$ID' ";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
		$updateImg = $row['image'];
		
	}

	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$phonenumber =$_POST['phonenumber'];
	$server = 'localhost';
	$dbuser ='root';
	$dbpass ='';
	$dbname ='contractList';
	$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);	
	if(!$conn){
		die("Connection Error".mysqli_connect_error());
	}
	$sql = "UPDATE contracts SET firstname = '$fname', lastname = '$lname', phonenumber = '$phonenumber',image = '$updateImg' WHERE id ='$ID'";
	$result = mysqli_query($conn,$sql);

	if($result === true){
		header('location:createContract.php');
			exit();
	}

?>