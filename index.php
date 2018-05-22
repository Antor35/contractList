<?php
	session_start();
  if(isset($_SESSION['email'])){
    session_destroy();
  }
 $_SESSION['from']='index';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <!--  required meta tag always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome|Contract List</title>

    <!-- Bootstarp css start here -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="indexStyle.css">
  </head>
  <body>

      <div class="container-fluid">

       		<div class="row first">
<!--  -->
       			<div class="col-sm-7">
                  <h1 class="welcome">Welcome to Contract List</h1>
           </div>

       			<div class="col-sm-5">
<!--  -->
       			<!-- <div class="col-md-6">
                  <h1 class="welcome">Welcome to Contract List</h1>
           </div>

       			<div class="col-md-6"> -->
<!--  -->

       				<form class="form-inline" role='form' action="loginProcess.php"  method="post">

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

          <div class="row second">
               <div class="col-lg-4">
              </div>
              <div class="col-lg-6 register-form">
                   <h1> Register Here</h1>
                   <form method="post" action="signupProcess.php">

                    <!-- First name started Here-->
                    <div class="form-group">
                        <label for="fstName">
                         First Name<span  style="color:red;"> *<br/> </span>
                           <?php
                              if(isset($_SESSION['fnameErr'])){
                               echo $_SESSION['fnameErr'];
                               unset($_SESSION['fnameErr']);
                              }
                           ?>
                        </label>
                         <input type="text" name="fstName" class="form-control" id="fstName" value="<?php
                          if(isset($_SESSION['fstName'])){
                           echo $_SESSION['fstName'];
                           unset($_SESSION['fstName']);
                          }
                         ?>">
                    </div>
                    <!-- End of first Name -->

                    <!-- Last name started here -->
                    <div class="form-group">
                      <label for="lstName">Last Name <span style="color:red;"> *<br></span>
                        <?php
                              if(isset($_SESSION['lnameErr'])){
                               echo $_SESSION['lnameErr'];
                               unset($_SESSION['lnameErr']);
                              }
                           ?>
                      </label>
                      <input type="text" name="lstname" class="form-control" id="lstname" value="<?php
                      if(isset($_SESSION['lstname'])){
                       echo($_SESSION['lstname']);
                       unset($_SESSION['lstname']);
                      }
                      ?>">
                    </div>
                    <!-- End of last name -->
                    <!-- Email started Here -->
                    <div class="form-group">
                      <label>Email <span style="color:red;"> *<br></span>
                         <?php
                          if(isset($_SESSION['emailErr'])){
                           echo $_SESSION['emailErr'];
                           unset($_SESSION['emailErr']);
                          }
                         ?>
                      </label>
                      <input type="email" name="email" class="form-control" id="email" value="<?php
                      if(isset($_SESSION['email'])){
                       echo $_SESSION['email'];
                       unset($_SESSION['email']);
                      }
                      ?>">
                    </div>
                    <!-- End of Email -->
                    <!-- Gender started here -->
                    <div class="form-group gender">
                       <label for="gender">Gender:</label>
                        <label class="radio-inline">
                              <input type="radio" name="gender" value="male">Male
                         </label>
                         <label class="radio-inline">
                              <input type="radio" name="gender" value="Female">Female
                              <span style="color:red;">
                              <?php
                                if(isset($_SESSION['genderErr'])){
                                  echo $_SESSION['genderErr'];
                                  unset($_SESSION['genderErr']);
                                 }
                              ?>
                              </span>
                         </label>
                    </div>
                    <!-- End of Gender -->
                    <!-- password started here -->
                    <div class="form-group">
                       <label for="pwd">Password<span style="color:red;">*
                        <?php
                          if(isset($_SESSION['pwdErr'])){
                            echo $_SESSION['pwdErr'];
                            unset($_SESSION['pwdErr']);
                          }
                        ?>
                        </span>
                       </label><br>
                       <input type="password" name="pwd" id="pwd" value="<?php
                          unset($_SESSION['pwd']);
                       ?>">
                    </div>
                    <!-- End of password -->

                    <div class="form-group">
                      <label for="repwd">Confrim Password</label><br>
                      <input type="password" name="repwd" id="repwd">
                    </div>
                     <input class="btn btn-warning" type="submit" name="submit" value="Signup">
                 </form>

                </div> 
                <div class="col-lg-2"></div>
             </div>

         <div>
 
    <!-- Always jquery first then bootstrap js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>