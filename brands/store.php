<?php

session_start();
$_title=$_POST['title'];
$_link=$_POST['link'];

if(array_key_exists('is_active', $_POST)){
  $_is_active=$_POST['is_active'];
}
else{
  $_is_active=0;
}

date_default_timezone_set('Asia/Dhaka');
$_created_at= date('Y-m-d h-i-s',time());

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `brands` (`title`, `link`, `is_active`,`created_at`) VALUES (:title, :link, :is_active, :created_at);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':title', $_title );
 $stmt->bindParam(':link', $_link);
 $stmt->bindParam(':is_active', $_is_active);
 $stmt->bindParam(':created_at', $_created_at);


 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product added successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not added!";
 }
 header("location:index.php");

?>
