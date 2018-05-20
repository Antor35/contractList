<?php
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
   <!--  required meta tag always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>learn | Bootstrap</title>

    <!-- Bootstarp css start here -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
  </head>
<body>
	<div class="container-fluid">

       		<div class="row first">
       			<div class="col-sm-11">
                  <h1 class="welcome">Welcome to Contract List</h1>
               </div>

       			<div class="col-sm-1">
       					<div id="back">
			 	          <input type="button" name="Back" value="Back" onclick="document.location.href= 'createContract.php' ">
                       </div>
       			</div>
       </div>
	<div class="container">
		<div class="row second">
			<div class="add col-md-4 col-md-offset-4 form">

				<form action="addPeopleProcess.php" method="POST" enctype="multipart/form-data" >
					  <fieldset>
					  		<h1>About People</h1>

					  		<label for="firstname">FirstName<span  style="color:red;"> *<br/>
					  		<?php
					  			if(isset($_SESSION['fnameErr'])){
					  				echo $_SESSION['fnameErr'];
					  				unset($_SESSION['fnameErr']);
					  			}
					  		?></span>
					  		</label><br>
					  		<input type="text" name="firstname" id="firstname"
					  		value="<?php
					  				if(isset($_SESSION['fname'])){
					  					echo $_SESSION['fname'];
					  					unset($_SESSION['fname']);
					  				}
					  		?>" 
					  		><br><br>


					  		<label for="lastname">Lastname<span style="color:red;">*<br>
					  			<?php
   									if(isset($_SESSION['lnameErr'])){
   										echo $_SESSION['lnameErr'];
   										unset($_SESSION['lnameErr']);
   									}
					  			?></span>
					  		</label><br>
					  		<input type="text" name="lastname" id="lastname" value="<?php
					  			if(isset($_SESSION['lname'])){
					  				echo $_SESSION['lname'];
					  				unset($_SESSION['lname']);
					  			}
					  		?>"><br><br>


					  		<label for="phonenumber">Phone Number<span style="color: red;">*<br>
					  			<?php
					  				if(isset($_SESSION['pnumberErr'])){
					  					echo $_SESSION['pnumberErr'];
					  					unset($_SESSION['pnumberErr']);
					  				}
					  			?></span>
					  		</label><br>
					  		<input type="text" name="phonenumber" id="phonenumber" value="<?php
					  		if(isset($_SESSION['pnumber'])){
					  			echo $_SESSION['pnumber'];
					  			unset($_SESSION['pnumber']);
					  		}
					  		?>"><br><br>

					  		<!-- image handle  -->
					  		<label for="img">Profile Picture<span style="color:red;">*<br>
					  			<?php
					  				if(isset($_SESSION['imgErr'])){
					  					echo $_SESSION['imgErr'];
										unset($_SESSION['imgErr']);
					  				}
					  			?>
					  			</span>
					  		</label>
					  		<input type="file" name="img">
					  		<br>
					  		<input type="submit" class="btn btn-primary" name="submit" value="Add">
					  </fieldset>
			  </form>

			</div>
		</div>
	</div>

</body>
</html>