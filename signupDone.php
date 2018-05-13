<?php
session_start();
$user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
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
       			<div class="col-sm-6">
                  <h1 class="welcome">Welcome to Contract List</h1>
           </div>

       			<div class="col-sm-3"></div>
       			<div class="col-sm-3"></div>
       		</div>

          <div class="row second">
              <div class="col-lg-5"></div>
              <div class="col-lg-2"></div>
              <div class="col-lg-5"></div> 
             </div>



         <div>
 
    <!-- Always jquery first then bootstrap js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>