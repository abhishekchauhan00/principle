<?php 
session_start(); 
include "dbconnection.php";

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role =$_POST['optradio'];
    $_SESSION['role'] = $role;
    $_SESSION['email']= $email;
    $q = "select * from users where email='$email' AND password= '$pass'";
    $q_run = mysqli_query($conn, $q);
    $num= mysqli_num_rows($q_run);
    if($num==1){
        if($role=='user'){
            header('location:user.php');
        }elseif($role=='vendor'){
            header('location:vendor.php');
        }
        
      
    
}
else{
    header('location:index.php');
}
}
?>