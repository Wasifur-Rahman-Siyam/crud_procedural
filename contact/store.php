<?php

session_start();
$_name=$_POST['name'];
$_email=$_POST['email'];
$_subject=$_POST['subject'];

$servername = "localhost";
$username = "root";
$password = "";

  $conn = new PDO("mysql:host=$servername;dbname=crud_pondit", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $query= "INSERT INTO `contact` (`name`, `email`, `subject`) VALUES (:name, :email,  :subject);";

 $stmt= $conn->prepare($query);
 $stmt->bindParam(':name', $_name );
 $stmt->bindParam(':email', $_email);
 $stmt->bindParam(':subject', $_subject);
 $result= $stmt->execute();

 if($result){
  $_SESSION['message'] = "Product added successfully!";
 }
 else{
  $_SESSION['message'] = "Product is not added!";
 }
 header("location:index.php"); 
?>
