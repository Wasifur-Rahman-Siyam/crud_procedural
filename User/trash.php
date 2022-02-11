<?php
session_start();
$_id=$_GET['id'];
$_soft_delete=1;



$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query= "UPDATE `user` SET `soft_delete` = :soft_delete WHERE `user`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':soft_delete', $_soft_delete );

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product moved to Trash successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not moved to Trash!";
 }

 header("location:index.php");
?>