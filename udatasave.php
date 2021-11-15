<?php 
session_start();
// Include the database configuration file  
require_once 'dbconnection.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    $text=$_POST['text'];
    $gtype= "wet";
    $city = "Delhi";
    $address= $_POST['address'];
    $e = $_SESSION['email'];
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            
            $q = "INSERT INTO `post` (`picture`, `timing`, `texts`, `gtype`, `city`, `addresss`,  `useremail`) VALUES ('$imgContent', NOW(), '$text', '$gtype', '$city', '$address', '$e')";
            $q_run = mysqli_query($conn, $q);
            if($q_run){ 
                $status = 'success'; 
                header('location:user.php');
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>