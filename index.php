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

    <link rel="stylesheet" href="style.css">
    <title>School</title>
  </head>
  <body style="background-color: light blue">
      <div class="container " id="a">
    <img class="logo" src="data:image/png;base64,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">
  <form class="mt-4" action="validation.php" method="POST">
  
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="optradio" id="inlineRadio1" value="user">
  <label class="form-check-label" for="inlineRadio1">Student </label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="optradio" id="inlineRadio2" value="vendor">
  <label class="form-check-label" for="inlineRadio2">principle</label>
</div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
  </div>
  
  <button type="submit" name="submit" class="btn btn-primary ">login</button>
</form>
</div>
<div class="container" id="b">
<a href="signupuser.html"><button class="btn btn- ">Signup as Student </button></a>
<a href="signupvendor.html"><button  class="btn btn- ">Signup as Principle</button></a>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>