<?php

session_start();
$_id=$_POST['id'];
$_name=$_POST['name'];
$_email=$_POST['email'];
$_password=$_POST['password'];
$_phone=$_POST['phone'];

$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "UPDATE `admins` SET `name` = :name , `email` = :email , `password` = :password ,`phone` =:phone	WHERE `admins`.`id` = :id;";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':id', $_id );
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':password', $_password);
 $stmt->bindParam(':phone', $_phone);

 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product Updated successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not Updated!";
 }

 header("location:index.php");
 
?>