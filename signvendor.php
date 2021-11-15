<?php
session_start(); 
include "dbconnection.php";

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email= $_POST['email'];
$v= $_POST['v'];
$password= $_POST['password'];
$city= "Delhi";


$q = "INSERT INTO `users` (`name`, `email`, `password`, `role`, `city`) VALUES ('$name', '$email', '$password', '$v', '$city')";
$q_run = mysqli_query($conn, $q);

if($q_run){
$_SESSION['msg'] = "Sign Up successfull";
header('location: index.php');
}
else{
	$_SESSION['msg'] = "Something Wrong";
header('location: index.php');
}
}

?>