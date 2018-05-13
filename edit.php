	<?php
		session_start();


			if(!isset($_SESSION['login']) && $_SESSION['login'] !== ''){
		                header ("Location: index.php");
		                exit; 
		    }


    
			$id = $_GET['id'];
			$server = 'localhost';
			$dbuser ='root';
			$dbpass ='';
			$dbname ='contractList';

			$conn = mysqli_connect($server,$dbuser,$dbpass,$dbname);
			if(!$conn){
				die("Connection Error".mysqli_connect_error());
			}
			$sql = " SELECT * FROM contracts WHERE id='$id'"; 
			$result = mysqli_query($conn,$sql);
			

			if(mysqli_num_rows($result)){
				while($row = mysqli_fetch_assoc($result)){
					$ID = $row['id'];
					$firstname =$row['firstname'];
					$lastname = $row['lastname'];
					$phonenumber =$row['phonenumber'];
				}
			}else{
				echo "error".error($conn);
			}
			mysqli_close($conn);
	?>
<!DOCTYPE html>
<html>
<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>learn | Bootstrap</title>

    
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
  </head>
<body>

			<div class="container-fluid">

	       		<div class="row first">
	       			<div class="col-sm-6">
	                  <h1 class="welcome">Welcome to Contract List</h1>
	               </div>
	               	<div class="col-sm-5"></div>
	       			<div class="col-sm-1">
	       				<div id="back">
			 	          <input type="button" name="Back" value="Back" onclick="document.location.href= 'createContract.php' ">
                       </div>
	       			</div>
	            </div>
           </div>
           <div class="container">
           	<div class="row second">
           		<div class="edit col-md-4 col-md-offset-4 form">
           			<form action="editprocess.php" method="POST" enctype="multipart/form-data">
						<h1>Edit your Information</h1>
						<div class="form-group">
							<label>First Name </label><br>
						    <input type="text" name="firstname" value="<?php echo $firstname;?>">
						</div>
						<div class="form-group">
							<label>Last Name </label><br>
						  <input type="text" name="lastname" value="<?php echo $lastname;?>">
						</div>
						 <div class="form-group">
						 	<label>Phone number </label><br>
						  <input type="text" name="phonenumber" value="<?php echo $phonenumber;?>">
						 </div>

						 <div>
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
						 </div>
						  <div class="form-group">
						  	<input type="hidden" name="id" value="<?php echo $id?>">
						  </div>
				<button type="submit" class="btn btn-success" name="submit">Save</button>
			
				</form>
           		</div>
           	</div>
           </div>
			<div id="editfrm">
				
			</div>
</body>
</html>