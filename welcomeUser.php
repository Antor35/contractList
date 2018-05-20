<?php
	if(isset($_SESSION['email']) && $_SESSION['email']!==''){
		header('location: createContract.php');
		exit;
	}
?>