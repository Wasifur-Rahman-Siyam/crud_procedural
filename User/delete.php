<?php
session_start();
$_id=$_GET['id'];


$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "DELETE FROM `contact` WHERE `contact`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Deleted successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Deleted!";
 }

 header("location:trash_index.php");
?>