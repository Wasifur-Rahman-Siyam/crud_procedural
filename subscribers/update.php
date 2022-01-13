<?php

session_start();
$_id=$_POST['id'];
$_email=$_POST['email'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $query= "UPDATE `subscribers` SET `email` = :email 	WHERE `subscribers`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':email', $_email);

 $result= $stmt->execute();
 
 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
?>