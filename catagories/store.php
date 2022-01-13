<?php

session_start();
$_name=$_POST['name'];
$_link=$_POST['link'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `catagories` (`name`, `link`) VALUES (:name, :link);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':name', $_name );
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
