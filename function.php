<?php
	function check($name){
		return $name;
	}
	function ismailExist($email){
		include 'dataBaseConnection.php';
		$sql = "SELECT email from users";
		$result = mysqli_query($conn,$sql);
		$rowNum = mysqli_num_rows($result);
		$found = false;
		if($rowNum>0){
			while($row = mysqli_fetch_assoc($result)){
				$demail = $row['email'];
				if($email===$demail){
					$found= true;
					break;
				}
			}
		}
		if($found)return true;
		return false;
	}
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	 }
?>