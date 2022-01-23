<?php

session_start();
$_name=$_POST['name'];
$_email=$_POST['email'];
$_password=$_POST['password'];
$_phone=$_POST['phone'];

$_created_at= date('Y-m-d h-i-s',time());

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `admins` (`name`, `email`,`password`, `phone`, `created_at`) VALUES ( :name, :email, :password, :phone, :created_at);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':password', $_password);
 $stmt->bindParam(':phone', $_phone);
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
