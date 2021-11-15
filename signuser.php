<?php
session_start(); 
include "dbconnection.php";

if(isset($_POST['submit'])){
$name = $_POST['name'];
$email= $_POST['email'];
$u= $_POST['u'];
$password= $_POST['password'];


$q = "INSERT INTO `users` (`name`, `email`, `password`, `role`) VALUES ('$name', '$email', '$password', '$u')";
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