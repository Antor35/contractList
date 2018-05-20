<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <!--  required meta tag always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Contract|Login</title>

    <!-- Bootstarp css start here -->
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
                  <input type="button" name="Home" value="Home" onclick="document.location.href= 'index.php' ">
                       </div>
            </div>
            
       		</div>

          <div class="row second">

              <div class="col-lg-5"></div>
              <div class="col-lg-5 register-form">
                   <h1 style="color:red;"><?php
                    if(isset($_SESSION['accountExist'])){
                      echo $_SESSION['accountExist'];
                      unset($_SESSION['accountExist']);
                    }
                   ?></h1>
              <form class="form" role='form' action="loginProcess.php"  method="post">

                    <div class="form-group"> 
                      <label for="email" class="label">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                    </div>
                
                   <div class="form-group">
                        <label for="password" class="label">password</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    </div>
                    <input type="submit" name="submit" class="btn btn-info" value="login">
              </form>

                </div> 

             </div>
 
    <!-- Always jquery first then bootstrap js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>