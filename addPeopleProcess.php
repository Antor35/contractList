<?php
	session_start();
	include 'function.php';
	$fnameErr = $lnameErr = $pnumberErr = $imgErr= "";
	$_SESSION['fname'] = test_input($_POST['firstname']);
	$_SESSION['lname'] = test_input($_POST['lastname']);
	$_SESSION['pnumber'] = test_input($_POST['phonenumber']);

	if($_SESSION['fname']===""){
		$fnameErr = "First Name is Empty";
		$_SESSION['fnameErr'] = $fnameErr;
	}

	if($_SESSION['lname']===""){
		$lnameErr = "last Name is Empty";
		$_SESSION['lnameErr'] = $lnameErr;
	}
	if($_SESSION['pnumber']===""){
		$pnumberErr = "Phone number is required";
		$_SESSION['pnumberErr'] = $pnumberErr;
	}

	// isn't upload a image 

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
			// else if($_FILES["img"]["size"] > 500000){

			// 	$imgErr = "File is larger then 5MB!";
			// 	$_SESSION['imgErr'] = $imgErr;
			// }
			else if($imageFileType !== "jpg" && $imageFileType !== "png" && $imageFileType !== "jpeg"&& $imageFileType !== "gif"){

				$imgErr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$_SESSION['imgErr'] = $imgErr;
			}

			if (!file_exists('/opt/lampp/htdocs/contractList/'.$target_dir)){
			    mkdir('/opt/lampp/htdocs/contractList/'.$target_dir);
			}
			 
			  //else if(!file_exists($target_file)){
			  	move_uploaded_file($tmp_name, $target_file);
			// }
			 // else{
				// $imgErr = "This photo is already used!";
				// $_SESSION['imgErr'] = $imgErr;
			 // }
		}
	}


	if($fnameErr!=="" || $lnameErr !=="" || $pnumberErr !=="" || $imgErr!==""){

		header('location:contractfrom.php');
		exit();
	}

	// echo "<img src='$target_file' height='50px' width='50px'>";
	// die();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Add your person</title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>
<body>
	 <?php
	 	if(isset($_POST)){
		 	$firstname = htmlentities($_POST['firstname']);
		 	$lastname = htmlentities($_POST['lastname']);
		 	$phonenumber = htmlentities($_POST['phonenumber']);
		 	$adminEmail = htmlentities($_SESSION['email']);
	 	}
	 	$adminEmail = $_SESSION['email'];
		$server = 'localhost';
		$dbuser ='root';
		$dbpass ='';
		$dbname ='contractList';
		$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
		if(!$conn){
			die("Connection Error".mysqli_connect_error());
		}
		$sql = " INSERT INTO contracts (adminEmail, firstname, lastname, phonenumber,image) VALUES ('$adminEmail', '$firstname', '$lastname', '$phonenumber','$target_file')";

		if($conn->query($sql)===true){
			header('location:createContract.php');
			exit();
		}else{
			echo "Error occar".$conn->error;
		}
		$conn->close();
	 ?>

</body>
</html>