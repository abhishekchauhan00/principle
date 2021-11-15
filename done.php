<?php 
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Recycle</title>
  </head>
  <body>
    <div style="height:2px; background-color:black;"></div>
     <div class="container" >
      
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
          <?php
         include "dbconnection.php";
          $e = $_SESSION['email'];
          $n = "SELECT * FROM users where email= '$e'";
          $n_run = mysqli_query($conn, $n);
          if(mysqli_num_rows($n_run) > 0){
          while ($row = mysqli_fetch_assoc($n_run)) {
          ?>
          <h5 class="h5 mb-0 text-gray-400" style="text-transform:uppercase; display: inline;">Hi <?php echo $row['name']; ?> !</h5>
          <?php
          }
          }
          else{
          echo "";
          }
          ?>
          <button onclick= "window.location.href='logout.php';" class="btn btn-info" style="float:right; border-radius:30px 20px; font-size:13px;">Log Out</button>
        </div>
        
        <div class="container" style="margin-top:50px">
        <?php
                       
                       include "dbconnection.php"; 
                        $e = $_SESSION['email'];
                        
                        mysqli_select_db($conn, 'apploication');
                        $query = "SELECT * FROM post where useremail= '$e' && statu='done' ";
                        $query_run = mysqli_query($conn, $query);
                        
                            if(mysqli_num_rows($query_run) > 0)
                            {
                            $number = 1;
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                    <?php $_SESSION['u'] = $row['useremail']; 
                    $_SESSION['timing'] = $row['timing'];
                    $_SESSION['pic']= $row['picture'];
                    $_SESSION['add']= $row['addresss'];?>
        <div class="card mb-4">
  <div class="card-header">
    Posted By  <?php
         include "dbconnection.php";
          $em = $_SESSION['u'];
          $n = "SELECT * FROM users where email= '$em'";
          $n_run = mysqli_query($conn, $n);
          if(mysqli_num_rows($n_run) > 0){
          while ($row = mysqli_fetch_assoc($n_run)) {
          ?>
         <b> <?php echo $row['name']; ?></b>
          <?php
          }
          }
          else{
          echo "";
          }
          ?>
          <br>
         <?php echo $_SESSION['timing']; ?> 
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-12" style="text-align:center">
      <img style="height:50vh; width: 80vw;" src="data:image/jpg;charset=utf8;base64,<?php  echo base64_encode($_SESSION['pic']); ?>">
        
        </div>
        <div class="col-12" style="padding-top:10px; padding-bottom:10px; background-color:#E8E8E8;">
        <h5>Complete Address:</h5>
        <?php echo $_SESSION['add']; ?> 
        </div>
       
        </div>
        
  </div>
  <button  class="btn btn-success " type="button" class="btn btn-success">Solved <i class="fa fa-check" style="color:black"></i></button>
</div>
        </div>
        <?php
                            $number++;
                            }
                            }
                            else
                            {
                            echo "";
                            }
                            ?>
</div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>