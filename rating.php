<?php
session_start(); 
include "dbconnection.php";

if(isset($_POST['submit'])){
$feedback = $_POST['feedback'];
$rating= $_POST['rating'];

$t = $_SESSION['timing'];


$q = "UPDATE `post` SET  statu='done', feedback= '$feedback', rating='$rating' where timing='$t' ";
$q_run = mysqli_query($conn, $q);

if($q_run){
$_SESSION['msg'] = "Sign Up successfull";
header('location: vendor.php');
}
else{
	$_SESSION['msg'] = "Something Wrong";

}
}

?>