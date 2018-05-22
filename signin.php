<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>signin</title>
	<link rel="stylesheet" type="text/css" href="indexStyle.css">
</head>
<body>
		
		<div id="frm">
			<form action="loginProcess.php" method="POST">
					<fieldset>
						<h1>Login Here</h1>
							<label for="email">Email ID</label>
					  <input type="email" name="email" id="email" placeholder="Enter your Email"><br><br> 
					 	<label for="password">Password</label>
					  <input type="password" name="password" id="password" placeholder="Enter your password"><br><br>	
					 	 <input type="submit" name="submit" id="submit" value="login">
					</fieldset>
				 
			</form>
		</div>

	<div></div>
</body>
</html>
