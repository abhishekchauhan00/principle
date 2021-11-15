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
    <title>School</title>
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
        
        <div style="margin-top:20px" >

  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addadminprofile" style="border-radius: 10px 2px 10px 2px">
                    <i class="fa fa-plus"></i> Add New Complaint
                    </button>
        </div>
        <div style="margin-top:50px">
        <div class="card">
  <div class="card-header">
    Your Contribution <i class="fa fa-trophy"></i>
  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-4" style="text-align:center">  <?php
         include "dbconnection.php";
          $e = $_SESSION['email'];
          $n = "SELECT * FROM post where useremail= '$e'";
          $n_run = mysqli_query($conn, $n);
          $rowcount=mysqli_num_rows($n_run);
       
          ?>
            <?php echo $rowcount ?>
        <i class="fa fa-file-image-o"></i><br> Post 
        </div>
        <div class="col-4" style="text-align:center">
          3 <i class="fa fa-star" style="color: yellow;"></i> Rating
        </div>
        <div class="col-4" style="text-align:center">
        
        </div>
        </div>
  </div>
</div>
        </div>

</div>

<button type="submit" name="submit" onclick="window.location.href='done.php'" class="btn btn-success m-4 ">List of Solved Complaint</button>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Add Complaint !</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="udatasave.php" method="POST" enctype="multipart/form-data">
                      <div class="modal-body">
                        <div class="form-group">
                          
                          <input type="text" name="text" class="form-control" placeholder="Text (if you want write something)">
                        </div>
                       
                        <div class="form-group">
                          
                          <select class="form-control" name="gtype"    style="color: black; display:none;">
                               <option value="" disabled selected hidden >Garbage type</option>
                                <option >Wet garbage</option>
                                 <option >Dry garbage</option></select>
                        </div>
                       
                       
                        <div class="form-group" style="display:none;">
                          <?php
                         include "dbconnection.php";
                        
                          mysqli_select_db($conn, 'application');
                          $query = "SELECT cname FROM cities ORDER BY cid";
                          $query_run = mysqli_query($conn, $query);
                          ?>
                          <select class="form-control" name="city" id="clas" style="color: black;">
                            <option value="" disabled selected hidden >Choose City</option>
                            <?php
                            if(mysqli_num_rows($query_run) > 0)
                            {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                            ?>
                            
                            <option style="color: black; text-transform: uppercase;"><?php echo $row['cname']; ?></option>
                            <?php
                            }
                            }
                            else
                            {
                            echo "";
                            }
                            ?>
                            
                          </select>
                        </div>
                       
                        
                        <div class="form-group">
                          
                          <input type="text" name="address" class="form-control checking_id" placeholder="Location(Class Name)" required style="color: black;">
                        
                        </div>
                    
  <div class="form-group">
    <label for="exampleFormControlFile1">Upload Picture</label>
    <input type="file" class="form-control-file" name="image" id="exampleFormControlFile1" Required>
  </div>
                      
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" name="submit" class="btn btn-primary">POST</button>
                      </div>
                          </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Add Student Modal End---------->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>