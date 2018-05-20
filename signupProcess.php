<?php
	session_start();
	require 'function.php';
	$fnameErr=$lnameErr= $emailErr=$genderErr=$pwdErr='';

	if($_SERVER["REQUEST_METHOD"] === "POST"){
		//first Name checked
		if(test_input($_POST['fstName'])===''){
			$fnameErr="First Name Required";
			$_SESSION['fnameErr']=$fnameErr;
		}
		else{
			$_SESSION['fstName']=check($_POST['fstName']);
			//header('location:index.php');
		}

		// last Name checked
		if(test_input($_POST['lstname'])===''){
			$lnameErr="Last Name Required";
			$_SESSION['lnameErr']=$lnameErr;
		}
		else{
			$_SESSION['lstname']=check($_POST['lstname']);
		}

		// email checked
		if(test_input($_POST['email'])==='' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
			$emailErr="Invalid Email";
			$_SESSION['emailErr']=$emailErr;
		}
		else{
			$ase = ismailExist($_POST['email']);
			if(!$ase)$_SESSION['email'] = check($_POST['email']);
			else{
				$emailErr="This mail is already exist";
			    $_SESSION['emailErr']=$emailErr;
			}
		}
		// gender check
		if(!isset($_POST['gender'])){
			$genderErr="Select your Gender";
			$_SESSION['genderErr']=$genderErr;
		}else{
			$_SESSION['genderr'] = $_POST['gender'];
		}
		// password match
		// 
		if($_POST['pwd'] ==='' || $_POST['repwd'] ===''){
			$pwdErr = "password Required";
			$_SESSION['pwdErr']=$pwdErr;

		}else{

			$res="";
			if($_POST['pwd'] !== $_POST['repwd'])$res="fu";
			if($res ===''){
				$_SESSION['pwd']=$_POST['pwd'];
			}
			else{
	         $pwdErr = "password Don't Match";
			 $_SESSION['pwdErr']=$pwdErr;
			}
		}
		//check if any error occur
		// if(!isset($_POST['gender'])){
		// 	echo "no";
		// 	die();
		// }
		if($fnameErr!=='' || $lnameErr !=='' || $emailErr !=='' || !isset($_POST['gender']) || $pwdErr!==''){
			if($_SESSION['from']==='index'){
				// echo $_SESSION['from'];
			 //    die();
				header('location:index.php');
				exit();
			}
			else{
				header('location:index.php');
				exit();
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">

</head>
<body>
		<?php
		if(isset($_POST)){
			//var_dump($_POST);
			$firstName = htmlentities($_POST['fstName']);
			$lastName = htmlentities($_POST['lstname']);
			$email = htmlentities($_POST['email']);
			$password = htmlentities($_POST['pwd']);
			//if($password ==='')die("Please fillup Your password");
			$gender = htmlentities($_POST['gender']);
		}
 		Require 'dataBaseConnection.php';
		$sql = " INSERT INTO users (firstName, lastName, gender, email, password) VALUES ('$firstName', '$lastName', '$gender', '$email', '$password')";

		if($conn->query($sql)===true){
			$_SESSION['username'] = $firstName;
			header('location: createContract.php');
		}else{
			echo "Error occar".$conn->error;
		}

		$conn->close();
?>

</body>
</html> 