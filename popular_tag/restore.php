<?php
session_start();
$_id=$_GET['id'];
$_soft_delete=0;



$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $query= "UPDATE `popular_tag` SET `soft_delete` = :soft_delete WHERE `popular_tag`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':soft_delete', $_soft_delete );

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Restored successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Restored!";
 }

 header("location:trash_index.php");
?>