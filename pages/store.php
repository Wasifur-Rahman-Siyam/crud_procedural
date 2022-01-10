<?php

session_start();
$_title=$_POST['title'];
$_link=$_POST['link'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `pages` (`title`, `link`) VALUES ( :title, :link);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':title', $_title );
 $stmt->bindParam(':link', $_link);
 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product added successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not added!";
 }
 header("location:index.php");
?>
