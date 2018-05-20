<?php
	session_start();
  if(!isset($_SESSION['login']) && $_SESSION['login'] !== ''){
                header ("Location: index.php");
                echo "here";
                exit; 
                die();
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <!--  required meta tag always come first -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contract List</title>

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
       				<div id="logout">
			 	       <input type="button" name="logout" value="logout" onclick="document.location.href= 'logout.php' ">
              </div>
       			</div>
       			
       		</div>
       	</div>
       	<div class="container">
       		   
       	   <div class="row second">
               <div class="col-xs-12">
                <table class="table table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th style="font-family: Times New Roman; font-size:250%;color: red;" >profile Picture</th> 
                            <th style="font-family: Times New Roman; font-size:250%;color: red;">First Name</th>
                            <th style="font-family: Times New Roman; font-size:250%;color: red;">Last Name</th>
                           <th style="font-family: Times New Roman; font-size:250%;color: red;">phone Number</th>
                           <th style="font-family: Times New Roman; font-size:250%;color: red;">Option</th>
                       </tr> 
                    </thead>
                  <tbody> 
               <?php
                    $email = $_SESSION['email'];
                    Require 'dataBaseConnection.php';
                    $sql = "SELECT adminEmail, firstname, lastname, phonenumber,image,id FROM contracts WHERE 1 ";
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
                            echo "<tr>";

                             echo "<td><img src='".$row['image']."' height='110' width='110' style='border-radius: 75px; padding : 5px; margin-left : 75px; amrgin-right: -5px;'>"."</td>";

                              echo "<td style='font-family: Times New Roman; font-size:150%;'>".$row['firstname']."</td>";

                              echo "<td style='font-family: Times New Roman; font-size:150%;'>".$row['lastname']."</td>";

                             echo "<td style='font-family: Times New Roman; font-size:150%;'>".$row['phonenumber']."</td>";

                              echo "<td style='font-family: Times New Roman; font-size:150%;'>".'<a href="edit.php?id='. urlencode($id).'">'.'EDIT'.'</a>'.'<br>'.'<a href="delete.php?id='. urlencode($id).'">'.'DELETE'.'</a>'."</td>";

                             echo "</tr>";
                            $found++;
                          }
                        }
                        if($found === 0){
                         // echo "NO Result <br>";
                        }
                      }else{
                        //echo "NO Result <br>";
                      }
                      mysqli_close($conn);
                  ?>
                </tbody>
            </table>  
                <div class="addPeople">
                        <input type="submit" class="btn btn-warning" name="addPeople" value="Add New Contract"
                        onclick="document.location.href='contractfrom.php'">
                </div> 
              </div>

          </div>
       	</div>
 
    <!-- Always jquery first then bootstrap js -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>