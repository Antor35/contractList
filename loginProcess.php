<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>WelCome Contract Home</title>
</head>
<body>
		<?php
		$email = $_POST['email'];
		$password = $_POST['password'];

		// $server = 'localhost';
		// $dbuser ='root';
		// $dbpass ='';
		// $dbname ='contractList';

		// $conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
		// if(!$conn){
		// 	die("Connection Error".mysqli_connect_error());
		// }
		require 'dataBaseConnection.php';
		$sql = "SELECT email,password from users Where email='$email' AND password='$password'";
		$result = mysqli_query($conn,$sql);
		$rowNum = mysqli_num_rows($result);
		$found = false;
		$isAccount = false;
		if($rowNum>0){
			$_SESSION['email'] = $email; 
			$_SESSION['login'] = 'yes';
			header('location: createContract.php');
			exit();
			}
			else{

					$_SESSION['accountExist']="Incorrect Email or Password <br> Try aganin Here";
					header('location:login.php');
					exit();
			}
		mysqli_close($conn);
		?>
</body>
</html> 