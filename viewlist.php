<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>View List</title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>
<body>
		<div id="listcontainer">
				<h1>Your listed People</h1>
				<?php
					$email = $_SESSION['email'];
					$server = 'localhost';
					$dbuser ='root';
					$dbpass ='';
					$dbname ='contractList';

					$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
					if(!$conn){
						die("Connection Error".mysqli_connect_error());
					}

					$sql = "SELECT adminEmail, firstname, lastname, phonenumber,id FROM contracts WHERE 1 ";
					$result = mysqli_query($conn,$sql);
					$rowNum = mysqli_num_rows($result);
					$found = 0;

						if($rowNum>0){
							while($row = mysqli_fetch_assoc($result)){
								$adminemail = $row['adminEmail'];
								//$dpass = $row['password'];
								if($adminemail === $email){
									//echo $_SESSION['email'];
									$id = $row['id'];
									
									echo "=====".$found."=====";
									echo "<br>First Name : ".$row['firstname'].'<br>';
									echo "Last Name  : ".$row['lastname'].'<br>'; 
									echo "phone Number : ".$row['phonenumber'].'<br>';

									echo '<a href="delete.php?id='. urlencode($id).'">'.'DELETE'.'</a>'.'<br>';

									echo '<a href = "edit.php?id='.urlencode($id).'">'.'edit'.'</a>'.'<br>';
	
											$found++;
								}
							}
							if($found === 0){
								echo "NO Result <br>";
							}
						}else{
							echo "NO Result <br>";
						}
						mysqli_close($conn);
				?>
		</div>
					<div>
								<br><br>
						  <input type="button" name="back" value="Back" onclick="document.location.href='createContract.php'">
					</div>


					
</body>
</html>