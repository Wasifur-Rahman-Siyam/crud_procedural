<?php

session_start();


$app_root= $_SERVER['DOCUMENT_ROOT'] .'/Pondit_Practice/crud_pondit/testimonial/Uploads/';

$filename='IMG_'. time() . ' ' . $_FILES['picture']['name'];
$target =$_FILES['picture']['tmp_name'];
$destination=$app_root . $filename;
$is_file_moved=move_uploaded_file($target,$destination);
if($is_file_moved){
  $_picture=$filename;
}
else{
  $_picture=null;
}

if(array_key_exists('is_active', $_POST)){
  $_is_active=$_POST['is_active'];
}
else{
  $_is_active=0;
}

$_body=$_POST['body'];
$_name=$_POST['name'];
$_designation=$_POST['designation'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `testimonial` (`picture`,`body`, `name`, `designation`, `is_active`) VALUES (:picture, :body, :name,  :designation, :is_active);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':picture', $_picture );
 $stmt->bindParam(':body', $_body );
 $stmt->bindParam(':name', $_name);
 $stmt->bindParam(':designation', $_designation);
 $stmt->bindParam(':is_active', $_is_active);
 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product added successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not added!";
 }
 header("location:index.php"); 
?>
