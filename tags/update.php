<?php

session_start();
$_id=$_POST['id'];
$_title=$_POST['title'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $query= "UPDATE `tags` SET `title` = :title 	WHERE `tags`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':title', $_title);

 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>