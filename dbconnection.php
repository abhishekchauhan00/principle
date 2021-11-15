
<?php

$servername= "localhost";
$dbuser= "root";
$password = "";

$dbname = "application";

$conn = mysqli_connect("$servername", "$dbuser", "$password", "$dbname");

if (!$conn) {
	echo "Connection failed!";
}
?>



